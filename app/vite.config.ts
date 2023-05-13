import { defineConfig } from "vite"

/** Vite Plugins */
import vue from "@vitejs/plugin-vue"
import { ssr } from "vite-plugin-ssr/plugin"
import { fileURLToPath, URL } from "url"

/**
 * Vite Config
 *
 * @see https://vitejs.dev/config/
 */
export default defineConfig({
	server: {
		port: 80,
		host: true,
		strictPort: false
	},
	plugins: [vue(), ssr({ prerender: true })],
	resolve: {
		alias: {
			"@": fileURLToPath(new URL("./src", import.meta.url))
		}
	}
})
