import type { App, Plugin } from "vue"
type UserModule = (app?: App, ...args: unknown[]) => void

// eslint-disable-next-line @typescript-eslint/no-explicit-any
export interface Module extends Record<string, { [key: string]: any }> {
	/**
	 * Setups & Installs the module
	 */
	install: UserModule
}

function runOrInstall(app: App, option: Plugin | UserModule) {
	if (typeof option === "function") {
		option(app)
	} else {
		app.use(option)
	}
}

export function createModule(...options: (Plugin | UserModule)[]) {
	return {
		install: (app: App, ...args: unknown[]) => {
			options.forEach((option) => runOrInstall(app, option))
		}
	}
}
