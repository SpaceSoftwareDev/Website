<template>
	<form @submit.prevent="newsletterSubmit">
		<h3>Subscribe to our newsletter</h3>
		<div class="input">
			<input
				type="email"
				v-model="email"
				placeholder="example@example.com"
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />

			<button type="submit">Submit</button>
		</div>
	</form>
</template>
<script setup lang="ts">
import { ref } from "vue"

const email = ref<string>("")

const newsletterSubmit = () => {
	console.log(email.value)
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
		height: 100%;
		border: none;
		border-bottom-left-radius: 20px;
		border-top-left-radius: 20px;
		padding: 0.5rem 1rem;

		outline: none;

		&:focus {
			outline: none;
		}
	}

	button {
		width: 20%;
		height: 100%;
		border: none;
		border-bottom-right-radius: 20px;
		border-top-right-radius: 20px;
		background-color: #6babff;
		color: #ffffff;
	}
}
</style>
