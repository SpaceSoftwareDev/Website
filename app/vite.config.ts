import { defineConfig } from "vite"

/** Vite Plugins */
import vue from "@vitejs/plugin-vue"
import { ViteWebfontDownload } from "vite-plugin-webfont-dl"

import { fileURLToPath, URL } from "url"

/**
 * Vite Config
 *
 * @see https://vitejs.dev/config/
 */
export default defineConfig({
	server: {
		port: 80,
		host: true
	},
	plugins: [
		vue(),
		ViteWebfontDownload([
			"https://fonts.googleapis.com/css2?family=Space+Mono&display=swap", // Mono Font
			"https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" // Body Font
		])
	],
	resolve: {
		alias: {
			"@": fileURLToPath(new URL("./src", import.meta.url))
		}
	}
})
