<template>
	<main>
		<div v-if="is404">
			<h1>404 Page Not Found</h1>
			<p>This page could not be found.</p>
			<p>{{ errorInfo }}</p>
			<button @click="home">Go Back</button>
		</div>
		<div v-else>
			<h1>500 Internal Error</h1>
			<p>Something went wrong.</p>
		</div>
	</main>
</template>

<script lang="ts" setup>
import { navigate } from "vite-plugin-ssr/client/router"

function home() {
	navigate("/")
}

defineProps<{
	is404?: boolean
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

button {
	position: relative;
	margin-top: 5vh;
	padding: 20px 60px;
	border-radius: 360px;
	font-weight: 600;
	font-size: 1.7rem;
	filter: drop-shadow(3px 3px 3px rgba(0, 0, 0, 0.4));
	transition: all 200ms linear;

	&:hover {
		filter: drop-shadow(0px 0px 0px rgba(0, 0, 0, 0.4));
	}
}
</style>
