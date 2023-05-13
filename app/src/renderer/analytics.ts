const gtag = import.meta.env.VITE_GTAG

export const googletagmanager = `
		<script async src="https://www.googletagmanager.com/gtag/js?id=${gtag}"></script>
		<script>
			window.dataLayer = window.dataLayer || []
			function gtag() {
				dataLayer.push(arguments)
			}
			gtag("js", new Date())
			gtag("config", "${gtag}")
		</script>`
