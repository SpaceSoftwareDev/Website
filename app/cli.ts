#!/usr/bin/env tsx

import fs from "node:fs"
import path from "node:path"

import { build } from "vite"
import { cac } from "cac"
import pc from "picocolors"
import open from "open"

import express, { ErrorRequestHandler } from "express"
import compression from "compression"
import servestatic from "serve-static"

import type { render as renderType } from "src/scripts/entry-server"

const VERSION = "1.0"
const __dirname = process.cwd()
const resolve = (p: string) => path.resolve(__dirname, p)
const relative = (p: string) => path.relative(__dirname, resolve(p))

function createServer() {
	const app = express()

	const errorHandler: ErrorRequestHandler = (err, _req, res, _next) => {
		res.status(500).end(err.stack)
	}

	app.use(errorHandler)

	return app
}

class ServerAPI {
	static replaceHTML(
		template: string,
		app: string,
		preloadLinks: string
	): string {
		const html = template
			.replace(`<div id="app"></div>`, `<div id="app">${app}</div>`)
			.replace(`<link href="[CSS URL]" rel="stylesheet" />`, preloadLinks)
			.replaceAll(/^\s*$(?:\r\n?|\n)/gm, "")
		return html
	}

	static async createServer(
		port = 80
	): Promise<{ app: express.Application; port: number }> {
		const template = fs.readFileSync(
			resolve("dist/client/index.html"),
			"utf-8"
		)
		const manifest = fs
			.readFileSync(resolve("dist/client/ssr-manifest.json"))
			.toJSON()

		const app = createServer()

		app.use(compression()).use(
			"/",
			servestatic(resolve("./dist/client"), {
				index: false
			})
		)

		app.use("*", async (_req, res) => {
			const path = relative("dist/server/entry-server.mjs")
			const render: typeof renderType = (await import(path)).render

			const { appHtml, preloadLinks } = await render(manifest)
			const html = this.replaceHTML(template, appHtml, preloadLinks)

			res.status(200).set({ "Content-Type": "text/html" }).end(html)
		})

		return { app, port }
	}

	static async prerender() {
		const manifest = fs
			.readFileSync(relative("dist/static/ssr-manifest.json"))
			.toJSON()
		const template = fs.readFileSync(
			relative("dist/static/index.html"),
			"utf-8"
		)

		const path = relative("dist/server/entry-server.mjs")
		const render: typeof renderType = (await import(path)).render

		const { appHtml, preloadLinks } = await render(manifest)
		const html = this.replaceHTML(template, appHtml, preloadLinks)

		const filePath = relative("dist/static/index.html")
		fs.writeFileSync(filePath, html)
		fs.unlinkSync(resolve("dist/static/ssr-manifest.json"))
	}

	static async staticServer(port = 80): Promise<{
		app: express.Application
		port: number
	}> {
		const app = createServer()

		app.use(compression()).use(
			"/",
			servestatic(resolve("./dist/static"), {
				index: false
			})
		)

		app.use("*", async (req, res) => {
			const path = req.path === "/" ? "index.html" : req.path
			const html = fs.readFileSync(resolve(`dist/static/${path}`))
			res.status(200).set({ "Content-Type": "text/html" }).end(html)
		})

		return { app, port }
	}
}

function title(mode = "SSR") {
	console.log(
		`\n${pc.green(`${pc.cyan(mode)} ${pc.yellow("CLI")} v${VERSION}`)}\n`
	)
}

class Build {
	static async server() {
		await build({
			build: {
				ssr: resolve("src/scripts/entry-server.ts"),
				outDir: resolve("dist/server"),
				minify: "esbuild"
			}
		})
	}

	static async client() {
		await build({
			build: {
				ssrManifest: true,
				outDir: resolve("dist/client"),
				minify: "esbuild"
			}
		})
	}

	static async static() {
		await build({
			build: {
				ssrManifest: true,
				outDir: resolve("dist/static"),
				minify: "esbuild"
			}
		})
	}
}

const buildCommand = async (mode: "ssr" | "ssg") => {
	if (!["ssr", "ssg"].includes(mode)) throw new Error()

	await Build.server()
	if (mode === "ssr") {
		await Build.client()
	} else if (mode === "ssg") {
		await Build.static()
		ServerAPI.prerender()
	}
}

const clean = () => {
	console.log(pc.dim(`Removing ${pc.bold("dist")} directory...`))
	fs.rmSync(resolve("dist"), { recursive: true })
}

const cli = cac()

cli.command("build <mode>", "Build the project")
	.option("--clean", "Clean build")
	.action((mode: "ssr" | "ssg", options: { clean: boolean }) => {
		title(mode.toUpperCase())
		if (options.clean) clean()
		buildCommand("ssg")
	})

cli.command("server", "Start the SSR server")
	.option("--port [port]", "Port for the SSR server", {
		default: 80
	})
	.option("--open", "Open link in browser", {
		default: false
	})
	.action(async (options: { port: number; open: boolean }) => {
		title()
		if (!fs.existsSync(resolve("dist"))) {
			console.log(pc.bold(pc.dim("Project not built, building...")))
			await buildCommand("ssr")
		}

		ServerAPI.createServer(options.port).then(({ app, port }) => {
			console.clear()
			title()

			app.listen(port)
			const colorUrl = pc.cyan(`http://localhost:${pc.bold(port)}/`)
			console.log(`  ${pc.green("➜")}  ${pc.bold("Local")}: ${colorUrl}`)

			if (options.open) open(`http://localhost:${port}`, { wait: false })
		})
	})

cli.command("serve", "Start the SSG server")
	.option("--port [port]", "Port for the SSG server", {
		default: 80
	})
	.option("--open", "Open link in browser", {
		default: false
	})
	.action(async (options: { port: number; open: boolean }) => {
		title()
		if (!fs.existsSync(resolve("dist/static"))) {
			console.log(pc.bold(pc.dim("Project not built, building...")))
			await buildCommand("ssg")
		}

		ServerAPI.staticServer(options.port).then(({ app, port }) => {
			console.clear()
			title("SSG")

			app.listen(port)
			const colorUrl = pc.cyan(`http://localhost:${pc.bold(port)}/`)
			console.log(`  ${pc.green("➜")}  ${pc.bold("Local")}: ${colorUrl}`)

			if (options.open) open(`http://localhost:${port}`, { wait: false })
		})
	})

cli.command("clean", "Clean the project")
	.alias("clear")
	.action(() => clean())

cli.help()
cli.version("1.0a")

try {
	cli.parse(process.argv, { run: false })
	if (!fs.readdirSync(resolve(".")).includes("vite.config.ts"))
		throw new Error("Invalid directory", {
			cause: "User executed script in an invalid directory\n → Directory must contain a valid vite vue.js project"
		})
	cli.runMatchedCommand()
} catch (error) {
	console.log(pc.bold(pc.red(error.message)))
	if (error.cause) console.log(pc.dim(error.cause))
	else console.log(error)
	process.exit(1)
}
