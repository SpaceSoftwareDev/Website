<template>
	<div :class="{ dividerLineWrapper: true, right }">
		<h2>
			<slot />
		</h2>
		<div v-if="large" class="dividerLine" />
	</div>
</template>
<script lang="ts" setup>
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"
const large = useBreakpoints(breakpointsTailwind).lg

defineProps<{
	right?: true
}>()
</script>
<style lang="scss" scoped>
h2 {
	font-family: "Poppins", sans-serif;
	color: #2f2f2f;
	margin: 0 2rem 0 0;
	min-width: 20vw;
	text-align: right;
}

.dividerLine {
	background-color: #bbd8ff93;
	width: 90vw;
	margin-right: 8rem;
	height: 3px;
}

.dividerLineWrapper {
	margin-top: 10vh;
	width: 100%;
	max-width: 100%;
	padding-left: 2rem;
	padding-right: 2rem;
	display: flex;
	justify-content: space-between;
	align-items: center;

	&.right {
		flex-direction: row-reverse;

		h2 {
			text-align: left;
			margin-left: 2rem;
			margin-right: 4rem;
		}

		.dividerLine {
			margin-left: 8rem;
			margin-right: 0;
		}
	}
}

@media (max-width: 1024px) {
	h2 {
		text-align: center !important;
		margin: 0;
		width: 100%;
	}

	.dividerLineWrapper {
		padding: 0;
		margin-left: 0;
		margin-right: 0;

		&.right {
			margin-left: 0;
			margin-right: 0;

			h2 {
				margin: 0;
				text-align: center !important;
			}
		}
	}
}
</style>
