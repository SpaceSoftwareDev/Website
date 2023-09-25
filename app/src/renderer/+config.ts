import type { Config } from "vike/types"

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
