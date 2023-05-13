<template>
	<main>
		<div v-if="is404">
			<h1>404 Page Not Found</h1>
			<p>This page could not be found.</p>
			<p>{{ errorInfo }}</p>
		</div>
		<div v-else>
			<h1>500 Internal Error</h1>
			<p>Something went wrong.</p>
		</div>
	</main>
</template>

<script lang="ts" setup>
defineProps<{
	is404?: bool
	errorInfo?: string
}>()
</script>

<style lang="scss" scoped>
main {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 98dvh;
	text-align: center;
}
</style>
