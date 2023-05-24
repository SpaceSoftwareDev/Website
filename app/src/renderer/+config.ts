import type { Config } from "vite-plugin-ssr/types"

export default {
	passToClient: ["pageProps", "title"],
	clientRouting: true,
	prefetchStaticAssets: "viewport",
	meta: {
		title: {
			env: "server-and-client"
		}
	}
} satisfies Config
