import { createRouter, createWebHistory } from "@ionic/vue-router"
import type { RouteRecordRaw } from "vue-router"

const routes: Array<RouteRecordRaw> = [
	{
		path: "/",
		name: "Home",
		component: () => import("@/views/HomePage.vue")
	}
]

const router = createRouter({
	history: createWebHistory(),
	routes
})

export default router
