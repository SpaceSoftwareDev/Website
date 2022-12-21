<template>
	<footer>
		<div class="rightsFooter">
			<a href="https://space-software.com/">
				<img alt="logo" src="/assets/space-logo.svg" class="logo" />
			</a>
			<p>
				<span class="copyright">️©</span>
				2021 - {{ new Date().getFullYear() }} All rights reserved
			</p>
		</div>

		<div class="contacts">
			<a
				class="contact"
				href="https://goo.gl/maps/GtSMqiGos6WFJYZn6"
				target="_blank">
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
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: space-around;
	background-color: rgba(255, 255, 255, 0.5);
}

.copyright {
	font-family: "Poppins", sans-serif;
	font-weight: 700;
}

.logo {
	max-width: 20rem;
	height: 25px;
}

.rightsFooter {
	display: flex;
	flex-direction: column;
	align-items: start;
	justify-content: center;

	a {
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: center;
	}

	p {
		margin: 0.5rem 0 0 0;
	}
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

	ion-icon {
		color: #2f2f2f;
		margin-right: 1rem;
		transform: scale(1.3);
	}

	p {
		margin: 0.3rem 0;
	}

	&:hover {
		ion-icon {
			color: #00d1ff;
		}

		p {
			background: linear-gradient(
				to bottom right,
				#00d1ff 17%,
				#0209b5 100%
			);
			background-clip: text;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
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

	.rightsFooter {
		align-items: center;
	}
}
</style>
