import { createApp } from "vue"
import App from "./App.vue"
import router from "./router"

import { IonicVue } from "@ionic/vue"

import "@/styles/variables.scss"

const app = createApp(App)
	.use(IonicVue)
	.use(router)
	.mount("#app")

export default app