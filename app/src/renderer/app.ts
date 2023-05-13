import { createSSRApp, defineComponent, h, markRaw, reactive } from "vue"
import PageShell from "./PageShell.vue"
import type { Component, PageContext, PageProps } from "./types"
import { setPageContext } from "./usePageContext"

import "@/styles/index.scss"
import "swiper/css"
import "swiper/css/bundle"

export function createApp(pageContext: PageContext) {
	const { Page } = pageContext

	let rootComponent: Component & { Page: Component; pageProps: PageProps }
	const PageWithWrapper = defineComponent({
		data: () => ({
			Page: markRaw(Page),
			pageProps: markRaw(pageContext.pageProps || {})
		}),
		created() {
			// eslint-disable-next-line @typescript-eslint/no-this-alias
			rootComponent = this
		},
		render() {
			return h(
				PageShell,
				{},
				{
					default: () => {
						return h(this.Page, this.pageProps)
					}
				}
			)
		}
	})

	const app = createSSRApp(PageWithWrapper)

	objectAssign(app, {
		changePage: (pageContext: PageContext) => {
			Object.assign(pageContextReactive, pageContext)
			rootComponent.Page = markRaw(pageContext.Page)
			rootComponent.pageProps = markRaw(pageContext.pageProps || {})
		}
	})

	const pageContextReactive = reactive(pageContext)

	setPageContext(app, pageContextReactive)

	return app
}

function objectAssign<Obj extends object, ObjAddendum>(obj: Obj, objAddendum: ObjAddendum): asserts obj is Obj & ObjAddendum {
	Object.assign(obj, objAddendum)
}
