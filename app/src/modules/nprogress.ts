import NProgress from "nprogress"
import { createModule } from "vvic-utils/modules"

import router from "@/router"

export const { install } = createModule(() => {
	router.beforeEach((to, from) => {
		if (to.path !== from.path) NProgress.start()
	})
	router.afterEach(() => {
		NProgress.done()
	})
})
