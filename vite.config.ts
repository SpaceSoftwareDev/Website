import { defineConfig } from "vite"
import vue from "@vitejs/plugin-vue"
import { fileURLToPath, URL } from "url"

import Compression from "vite-plugin-compression"
import progress from "vite-plugin-progress"
import colors from "picocolors"

// https://vitejs.dev/config/
export default defineConfig({
	plugins: [
		vue(),
		Compression(),
		progress({
			format: `${colors.green(colors.bold("Building"))} ${colors.cyan(
				":bar"
			)} :percent`,
			total: 200,
			width: 60
		}),
	],
	resolve: {
		alias: {
			"@": fileURLToPath(new URL("./src", import.meta.url))
		}
	}
})
