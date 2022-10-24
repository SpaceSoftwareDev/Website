import { createModule } from "vvic-utils/modules"

declare global {
	interface Window {
		/**
		 * [Prerender](https://prerender.io/) ready state
		 */
		prerenderReady: boolean
	}
}

export const { install } = createModule(() => {
	window.prerenderReady = false
})
