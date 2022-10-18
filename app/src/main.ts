import { createApp } from "vue"
import App from "@/App.vue"
import ModuleManager from "@/plugins/modules"

import "@/styles/index.scss"

createApp(App).use(ModuleManager).mount("#app")
