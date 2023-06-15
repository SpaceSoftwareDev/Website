<template>
	<main class="content">
		<Suspense>
			<slot />
		</Suspense>
		<Toasts />
	</main>
</template>

<script lang="ts" setup>
import { Toasts } from "@/components"
</script>
