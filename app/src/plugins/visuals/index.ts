import { Plugin, createUseHook, createInstall } from "vvic-utils/types"
import instance from "./logic"
import i18n from "./i18n"

const { provide, useHook } = createUseHook<typeof instance>(
	"visuals-plugin",
	instance
)

export class Visuals extends Plugin {
	public install = createInstall(provide, i18n.install)
}

export const useVisuals = useHook

/**
 * Vue Plugin for visual changes
 * - Color Mode & Language
 *
 * ***Usage:***
 * ```ts
 * import Visuals from "@/plugins/visuals"
 * app.use(Visuals)
 * ```
 */
export default new Visuals()
