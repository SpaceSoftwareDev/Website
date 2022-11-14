<template>
	<footer>
		<img src="/assets/rights-footer.svg" class="rightsImg" />
		<Newsletter class="newsletter" v-if="large" />
	</footer>
</template>

<script setup lang="ts">
import Newsletter from "./Newsletter.vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const large = useBreakpoints(breakpointsTailwind).lg
</script>
<style lang="scss" scoped>
footer {
	height: 20vh;
	padding-left: 5rem;
	padding-right: 5rem;
	background-color: rgba(255, 255, 255, 0.5);
	display: flex;
	flex-direction: row;
	align-items: center;

	width: 100vw;
}

.rightsImg {
	width: 20rem;
}

.newsletter {
	position: absolute;
	right: 5rem;
}

@media screen and (max-width: 1024px) {
	footer {
		padding-left: 2rem;
		padding-right: 2rem;
	}
}
</style>
