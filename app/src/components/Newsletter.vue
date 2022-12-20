<template>
	<form @submit.prevent="newsletterSubmit">
		<h3>Subscribe to our newsletter</h3>
		<div class="input">
			<input
				type="email"
				v-model="email"
				required
				placeholder="Your email..."
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />

			<button type="submit">
				<ion-icon :icon="send" />
			</button>
		</div>
	</form>
</template>
<script setup lang="ts">
import { ref } from "vue"
import axios from "axios"

import { IonIcon } from "@ionic/vue"
import { send } from "ionicons/icons"

const email = ref<string>("")

const newsletterSubmit = async () => {
	await axios.post(
		`${import.meta.env.VITE_CMS_URL}/api/v1/newsletter/subscribe`,
		{
			email: email.value
		}
	)
	email.value = ""
}
</script>

<style lang="scss" scoped>
form {
	margin: 1rem;
}

h3 {
	color: rgba(0, 0, 0, 0.4);
	text-align: center;
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
	}

	button {
		width: 20%;
		height: 50px;
		border-bottom-right-radius: 20px;
		border-top-right-radius: 20px;

		ion-icon {
			transform: scale(1.5);
			margin-top: 0.3rem;
		}

		&:hover {
			color: #00d1ff;
			background: #ffffff;

			ion-icon {
				filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.2));
			}
		}
	}
}
</style>
