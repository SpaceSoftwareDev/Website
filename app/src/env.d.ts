/// <reference types="vite/client" />

interface ImportMetaEnv {
	readonly VITE_CMS_URL: string
	readonly VITE_GTAG: string
}

interface ImportMeta {
	readonly env: ImportMetaEnv
}
