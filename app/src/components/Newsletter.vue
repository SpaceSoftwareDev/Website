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
import { IonIcon } from "@ionic/vue"
import { send } from "ionicons/icons"
import { ref } from "vue"
import axios from "axios"

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
		border: none;
		font-family: "Poppins", sans-serif;
		font-size: 0.85rem;
		border-bottom-left-radius: 20px;
		border-top-left-radius: 20px;
		padding: 0 1rem;
		outline: none;

		&:focus {
			outline: none;
		}
	}

	button {
		width: 20%;
		height: 50px;
		border: none;
		border-bottom-right-radius: 20px;
		border-top-right-radius: 20px;
		background: #00d1ff;
		background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
		color: #ffffff;
		cursor: pointer;

		ion-icon {
			transform: scale(1.5);
			margin-top: 0.2rem;
		}
	}
	button:hover {
		color: #00d1ff;
		background: #ffffff;
		transition: 200ms;
	}
}
</style>
