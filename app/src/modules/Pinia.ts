import { createModule } from "vvic-utils/modules"
import { createPinia } from "pinia"

export const { install } = createModule(createPinia())
