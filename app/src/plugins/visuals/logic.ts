import i18n from "./i18n"
import { StorageValue } from "vvic-utils/types"
import { ColorTheme } from "./types"

class ColorMode {
	private readonly mode = new StorageValue<ColorTheme>("colormode")
	readonly modes = ["dark", "light", "auto"]
	private readonly prefersDark = window.matchMedia(
		"(prefers-color-scheme: dark)"
	)

	async load() {
		if (!(await this.get)) await this.mode.set("auto")
		this.change(await this.get)
	}

	change(mode: ColorTheme) {
		if (mode === "auto") {
			this.autoCheck()
			this.prefersDark.addEventListener("change", this.autoCheck)
		} else {
			this.prefersDark.onchange = null
			if (mode === "dark") {
				document.body.classList.add("dark")
			} else {
				document.body.classList.remove("dark")
			}
		}
	}

	autoCheck(query?: MediaQueryListEvent) {
		document.body.classList.toggle(
			"dark",
			query ? query.matches : this.prefersDark.matches
		)
	}

	get get(): Promise<ColorTheme> {
		return this.mode.value
	}

	set state(mode: ColorTheme) {
		this.mode.set(mode)
		this.change(mode)
	}
}

class Language {
	private readonly lang = new StorageValue<string>("language")

	async load(): Promise<void> {
		await this.set(await this.get())
	}

	async get(): Promise<string> {
		return (await this.lang.get()) || "en"
	}

	async set(lang: string): Promise<void> {
		await this.lang.set(lang)
		i18n.global.locale.value = lang
	}
}

class Visuals {
	/**
	 * Color Theme Mode Wrapper
	 *
	 * **Usage**:
	 * ```ts
	 * import { useVisuals } from "@/plugins/visuals"
	 * const theme = useVisuals().colormode
	 * ```
	 */
	public readonly colormode = new ColorMode()

	/**
	 * Capacitor.js Interface Wrapper for Internationalization
	 *
	 * **Usage**:
	 * ```ts
	 * import { useVisuals } from "@/plugins/visuals"
	 * useVisuals().lang
	 * ```
	 */
	public readonly lang = new Language()

	private modules = [this.colormode.load(), this.lang.load()]

	public async load() {
		await Promise.all(this.modules)
	}
}

export default new Visuals()
