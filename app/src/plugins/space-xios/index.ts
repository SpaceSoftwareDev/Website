import { Plugin, createUseHook } from "vvic-utils/types"
import instance, { SpaceXios } from "./logic"

const { provide, useHook } = createUseHook<SpaceXios>("space-xios", instance)

export class SpaceXiosPlugin extends Plugin {
	public install = provide
}

/**
 * Function for getting the SpaceXios instance in components
 *
 * **Usage**:
 * ```ts
 * import { useSpaceXios } from "@/plugins"
 * const memes = useMemeAPI()
 * ```
 */
export const useSpaceXios = useHook

/**
 * Vue plugin for SpaceXios (Space Axios)
 *
 * **Usage**:
 * ```ts
 * import SpaceXios from "@/plugins/space-xios"
 * app.use(SpaceXios)
 * ```
 */
export default new SpaceXiosPlugin()

export * from "./logic"
export * from "./toast"
