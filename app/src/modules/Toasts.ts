import { createModule } from "vvic-utils/modules"
import VueToast from "vue-toast-notification"

import "vue-toast-notification/dist/theme-sugar.css"

export const { install } = createModule(VueToast)
