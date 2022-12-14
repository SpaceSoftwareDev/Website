import { createSSRApp } from "vue"
import App from "./App.vue"

import "@/styles/index.scss"
import "swiper/css"
import "swiper/css/bundle"

export function createApp() {
	const app = createSSRApp(App)

	return { app }
}
