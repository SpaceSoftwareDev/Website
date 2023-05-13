import type { Config } from "vite-plugin-ssr/types"

// https://vite-plugin-ssr.com/config
export default {
	passToClient: ["pageProps", "title"],
	clientRouting: true,
	prefetchStaticAssets: { when: "VIEWPORT" },
	meta: {
		title: {
			env: "server-and-client"
		}
	}
} satisfies Config
