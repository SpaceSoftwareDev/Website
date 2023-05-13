import type { PageContext } from "./types"

export function getPageTitle(pageContext: PageContext): string {
	return pageContext.title || pageContext.config.title || "space. | Software Studio"
}
