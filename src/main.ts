import { createApp } from "vue"
import App from "./App.vue"
import router from "@/router"

import { IonicVue } from "@ionic/vue"
import * as IonComponents from "@ionic/vue"

import { Component } from "vue"

import "@/styles/variables.scss"

const app = createApp(App).use(IonicVue).use(router)

Object.entries(IonComponents)
	.filter((entry) => /^Ion[A-Z]\w+$/.test(entry[0]))
	.forEach((entry) => {
		const component: Component = { ...entry[1] }
		app.component(entry[0], component)
	})

app.mount("#app")
export default app
