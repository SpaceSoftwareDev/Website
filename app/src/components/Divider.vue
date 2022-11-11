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
	width: 20%;
}

.dividerLine {
	background-color: #bbd8ff93;
	width: 90vw;
	height: 3px;
}

.dividerLineWrapper {
	margin-top: 10vh;
	width: 100%;
	padding-left: 8vw;
	padding-right: 8vw;
	display: flex;
	justify-content: space-between;
	align-items: center;

	&.right {
		flex-direction: row-reverse;

		h1 {
			text-align: right;
		}
	}
}

@media (max-width: 1000px) {
	h1 {
		width: 100%;
		text-align: center !important;
	}
	.dividerLineWrapper {
		padding: 0;
	}
}
</style>
