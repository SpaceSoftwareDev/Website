<template>
	<footer>
		<img alt="footer" src="/assets/rights-footer.svg" class="rightsImg" />

		<div class="contacts">
			<a class="contact" href="https://goo.gl/maps/GtSMqiGos6WFJYZn6">
				<ion-icon :icon="home" />
				<p>SPŠE Hálova 16, Bratislava</p>
			</a>
			<a class="contact" href="mailto:info@space-software.com">
				<ion-icon :icon="mail" />
				<p>info@space-software.com</p>
			</a>
			<a class="contact" href="tel:+421908072163">
				<ion-icon :icon="call" />
				<p>+421 908 072 163</p>
			</a>
		</div>

		<Newsletter class="newsletter" v-if="large" />
	</footer>
</template>

<script setup lang="ts">
import { IonIcon } from "@ionic/vue"
import { home, mail, call } from "ionicons/icons"

import Newsletter from "./Newsletter.vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const large = useBreakpoints(breakpointsTailwind).lg
</script>
<style lang="scss" scoped>
footer {
	height: 20vh;
	background-color: rgba(255, 255, 255, 0.5);

	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: space-around;

	max-width: 100vw;
	width: 100vw;
}

.rightsImg {
	max-width: 20rem;
	height: 50px;
}

.contacts {
	display: flex;
	justify-content: center;
	align-items: start;
	flex-direction: column;
}

.contact {
	display: flex;
	justify-content: center;
	align-items: center;
}

ion-icon {
	color: #2f2f2f;
	margin-right: 0.5rem;
	transform: scale(1.3);
}

p {
	margin: 0.4rem 0;
	color: rgba(0, 0, 0, 0.4);
}

.contact:hover {
	ion-icon {
		color: #00d1ff;
	}

	p {
		background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
		background-clip: text;
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}
}

@media screen and (max-width: 1024px) {
	footer {
		height: 40vh;

		padding-left: 0;
		padding-right: 0;

		justify-content: space-around;
		flex-direction: column-reverse;
	}
}
</style>
