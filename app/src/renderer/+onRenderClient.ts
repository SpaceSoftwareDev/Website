import { createApp } from "./app"
import { getPageTitle } from "./getPageTitle"
import type { PageContext } from "./types"
import type { PageContextBuiltInClientWithClientRouting as PageContextBuiltInClient } from "vike/types"

let app: ReturnType<typeof createApp>
export default async function onRenderClient(pageContext: PageContextBuiltInClient & PageContext) {
	if (!app) {
		app = createApp(pageContext)
		app.mount("#app")
	} else {
		app.changePage(pageContext)
	}
	document.title = getPageTitle(pageContext)
}
