import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router"

const routes: RouteRecordRaw[] = [
	{
		name: "Home",
		path: "/",
		component: () => import("@/views/Home.vue")
	},
	{
		path: "/:pathMatch(.*)*",
		redirect: { name: "Home" }
	}
]

const router = createRouter({ history: createWebHistory(), routes })

export default router
