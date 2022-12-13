import { createSSRApp, Component } from "vue"
import App from "./App.vue"
import * as IonComponents from "@ionic/vue"

import "@/styles/index.scss"
import "swiper/css"
import "swiper/css/bundle"

export function createApp() {
	const app = createSSRApp(App)

	Object.entries(IonComponents)
		.filter((entry) => /^Ion[A-Z]\w+$/.test(entry[0]))
		.forEach((entry) => {
			const component: Component = { ...entry[1] }
			app?.component(entry[0], component)
		})

	return { app }
}
