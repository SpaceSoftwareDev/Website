<template>
	<form @submit.prevent="newsletterSubmit">
		<h3>Subscribe to our newsletter</h3>
		<div class="input">
			<input
				type="email"
				v-model="email"
				required
				placeholder="example@example.com"
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />

			<button type="submit">Submit</button>
		</div>
	</form>
</template>
<script setup lang="ts">
import { ref } from "vue"
import axios from "axios"

const email = ref<string>("")

const newsletterSubmit = async () => {
	await axios.post(
		`${import.meta.env.VITE_CMS_URL}/api/v1/newsletter/email`,
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
		background-color: #6babff;
		color: #ffffff;
	}
}
</style>
