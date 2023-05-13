// Hook `usePageContext()` to make `pageContext` available from any Vue component.
// See https://vite-plugin-ssr.com/pageContext-anywhere

import { inject } from "vue"
import type { App } from "vue"
import { PageContext } from "./types"

export { usePageContext }
export { setPageContext }

const key = Symbol()

function usePageContext() {
	return inject(key)
}

function setPageContext(app: App, pageContext: PageContext) {
	app.provide(key, pageContext)
}
