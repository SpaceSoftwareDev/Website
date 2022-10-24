import { createRouter, createWebHistory } from "@ionic/vue-router"
import type { RouteRecordRaw } from "vue-router"

const routes: RouteRecordRaw[] = [
	{
		name: "Home",
		path: "/",
		component: () => import("@/views/Home.vue")
	}
]

/**
 * Ionic/Vue Router Instance
 *
 * @see https://router.vuejs.org/
 * @see https://ionicframework.com/docs/vue/navigation
 */
const router = createRouter({ history: createWebHistory(), routes })

export default router
