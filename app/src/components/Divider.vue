<template>
	<div class="divider">
		<div class="dividerLineWrapper" :class="{ right }">
			<h1>
				<slot />
			</h1>
			<div v-if="large" class="dividerLine" />
		</div>
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
	width: fit-content;
	text-align: left;
	font-weight: 600;
}

.divider {
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
}

.dividerLine {
	background-color: #cce2ff;
	width: 80%;
	height: 3px;
}

.dividerLineWrapper {
	max-width: 1920px;
	margin: 0 auto;
	margin-top: 10vh;
	width: 80%;

	display: flex;
	justify-content: space-around;
	align-items: center;

	&.right {
		flex-direction: row-reverse;

		h1 {
			text-align: right;
		}

		.dividerLine {
			margin-right: 0;
		}
	}
}

@media (max-width: 1024px) {
	h1 {
		text-align: center !important;
		margin: 0;
		width: 100%;
		font-size: 3.5vh;
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
