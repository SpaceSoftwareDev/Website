import { renderToNodeStream } from "@vue/server-renderer"
import { escapeInject, dangerouslySkipEscape } from "vike/server"
import { createApp } from "./app"
import { getPageTitle } from "./getPageTitle"
import { googletagmanager } from "./analytics"

import type { PageContext } from "./types"
import type { PageContextBuiltIn } from "vike/types"

export default async function onRenderHtml(pageContext: PageContextBuiltIn & PageContext) {
	const app = createApp(pageContext)
	const stream = renderToNodeStream(app)

	const title = getPageTitle(pageContext)

	const documentHtml = escapeInject`<!DOCTYPE html>
    <html lang="en">
		<head>
			<meta charset="UTF-8" />

			<link rel="manifest" href="/site.webmanifest" />

			<link rel="shortcut icon" sizes="any" href="/assets/icon/favicon.ico" />
			<link rel="apple-touch-icon" sizes="180x180" href="/assets/icon/apple-touch-icon.png" />

			<meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1.0" />

			<title>${title}</title>
			<meta name="description" content="Software studio founded by high school students" />
			<meta name="keywords" content="MemeTime!, Space Software, space., Space Software Studio, Vue.js, Ionic, TypeScript, OctoberCMS" />

			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="website" />
			<meta property="og:title" content="${title}" />
			<meta property="og:description" content="Software studio founded by high school students" />
			<meta property="og:url" content="https://space-software.com/" />
			<meta property="og:site_name" content="space-software.com" />
			<meta property="og:image" content="/assets/banner.png" />
			<meta property="og:image:width" content="1200" />
			<meta property="og:image:height" content="630" />
			<meta property="og:image:type" content="image/png" />

			<meta name="twitter:card" content="summary_large_image" />
			<meta name="twitter:title" content="${title}" />
			<meta name="twitter:description" content="Software studio founded by high school students" />
			<meta name="twitter:label1" content="Est. reading time" />
			<meta name="twitter:data1" content="1 minute" />

			${dangerouslySkipEscape(googletagmanager)}
		</head>
		<body>
			<div id="app">${stream}</div>
		</body>
    </html>`

	return {
		documentHtml,
		pageContext: {
			enableEagerStreaming: true
		}
	}
}
