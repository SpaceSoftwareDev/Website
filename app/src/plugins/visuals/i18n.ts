import { createI18n } from "vue-i18n"
import messages from "@intlify/vite-plugin-vue-i18n/messages"

export const fallbackLocale = "en"

export const i18n = createI18n({
	legacy: false,
	globalInjection: true,
	fallbackLocale,
	messages
})

export default i18n
