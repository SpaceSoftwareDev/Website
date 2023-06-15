import { inject } from "vue"
import type { App } from "vue"
import { PageContext } from "./types"

export { usePageContext }
export { setPageContext }

const key = Symbol("vps-ctx")

function usePageContext() {
	return inject(key)
}

function setPageContext(app: App, pageContext: PageContext) {
	app.provide(key, pageContext)
}
