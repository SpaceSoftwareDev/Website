<template>
	<form @submit.prevent="newsletterSubmit" aria-label="Newsletter Subscription">
		<h1>Subscribe to our newsletter</h1>
		<div class="input">
			<input
				name="Newsletter"
				autocomplete="email"
				aria-autocomplete="inline"
				type="email"
				v-model="email"
				required
				placeholder="Your email"
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />

			<button type="submit" aria-label="Subscribe">
				<icon icon="ion:send" class="icon" />
			</button>
		</div>
	</form>
</template>
<script setup lang="ts">
import { ref } from "vue"
import axios from "axios"
import { Icon } from "@iconify/vue"

const email = ref<string>("")

const newsletterSubmit = async () => {
	await axios.post("newsletter/subscribe", {
		email: email.value
	})
	email.value = ""
}
</script>

<style lang="scss" scoped>
form {
	margin: 1rem;
}

h1 {
	color: rgba(0, 0, 0, 0.4);
	text-align: center;
	font-size: 1.17em;
	font-weight: 600;
	padding-bottom: 1rem;
	margin: 0;
}

.input {
	width: 300px;
	height: 50px;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50%;

	input {
		width: 80%;
		height: 50px;
		border-bottom-left-radius: 20px;
		border-top-left-radius: 20px;
		padding: 0 1rem;
		background-color: white;
		color: black;

		&:autofill,
		&:-webkit-autofill {
			-webkit-text-fill-color: black !important;
			-webkit-box-shadow: 0 0 0 30px white inset !important;
		}
	}

	button {
		width: 20%;
		height: 50px;
		border-bottom-right-radius: 20px;
		border-top-right-radius: 20px;
		background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
		color: white;
		border: none;

		.icon {
			height: 25px;
			transition: all 300ms ease-in-out;
			transform: scale(1.5);
			margin-top: 0.3rem;
		}

		&:hover {
			color: #00d1ff;
			background: #ffffff;

			.icon {
				filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.2));
			}
		}
	}
}
</style>
