import { App } from "vue"
import { Module } from "./types"
import { Plugin } from "vvic-utils/types"

export class ModuleManager extends Plugin {
	private modules: Module[] = []

	private register() {
		this.modules = Object.values(
			import.meta.glob<Module>(
				["../../modules/*.ts", "../../modules/**/index.ts"],
				{ eager: true }
			)
		)
	}

	private installModules(app: App) {
		this.modules.forEach((module) => {
			module?.install(app)
		})
	}

	public install(app: App) {
		this.register()
		this.installModules(app)
	}
}

/**
 * Automated Vue plugin installation
 *
 * ***Usage:***
 * ```ts
 * import ModuleManager from "@/plugins/modules"
 * app.use(ModuleManager)
 * ```
 */
export default new ModuleManager()
