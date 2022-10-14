import { defineConfig } from "vite"

/** Vite Plugins */
import vue from "@vitejs/plugin-vue"
import vueI18n from "@intlify/vite-plugin-vue-i18n"
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
		vueI18n({
			include: fileURLToPath(new URL("./src/locales/**", import.meta.url))
		}),
		ViteWebfontDownload([
			"https://fonts.googleapis.com/css?family=Sarina",
			"https://fonts.googleapis.com/css?family=Roboto"
		])
	],
	resolve: {
		alias: {
			"@": fileURLToPath(new URL("./src", import.meta.url))
		}
	}
})
