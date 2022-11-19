<template>
	<div :class="{ dividerLineWrapper: true, right }">
		<h1><slot /></h1>
		<div v-if="large" class="dividerLine"></div>
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
h1 {
	font-family: "Poppins";
	color: #252525;
	font-weight: 800;
	margin: 0;
	margin-right: 2rem;
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

		h1 {
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
	h1 {
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

			h1 {
				margin: 0;
				text-align: center !important;
			}
		}
	}
}
</style>
