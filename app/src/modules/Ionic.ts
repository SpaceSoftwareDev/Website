import { createModule } from "vvic-utils/modules"
import { IonicVue } from "@ionic/vue"
import { App, Component } from "vue"
import * as IonComponents from "@ionic/vue"
import * as icons from "ionicons/icons"

import "@/styles/ionic.scss"

export const { install } = createModule(IonicVue, (app: App) => {
	Object.entries(IonComponents)
		.filter((entry) => /^Ion[A-Z]\w+$/.test(entry[0]))
		.forEach((entry) => {
			const component: Component = { ...entry[1] }
			app?.component(entry[0], component)
		})
	Object.assign(global, { ionicons: icons })
})

declare global {
	let ionicons: typeof icons
}