<template>
	<div class="wrapper">
		<ion-card v-for="member in members" :key="member.name">
			<div class="memberPic">
				<img :src="member.img" />
			</div>
			<h1>{{ member.name }}</h1>
			<p>{{ member.role }}</p>
			<a :href="member.portfolio" target="_blank">
				<Button class="btn">Portfolio</Button>
			</a>
		</ion-card>
	</div>
</template>
<script setup lang="ts">
import { ref } from "vue"
import Button from "@/components/Button.vue"
const members = ref([
	{
		name: "Lucas Ligas",
		role: "Front-End Developer",
		img: "/assets/LucasImg.png",
		portfolio: ""
	},
	{
		name: "Jakub Krčmárik",
		role: "Full Stack Developer",
		img: "/assets/krcmarikMalicky.png",
		portfolio: ""
	},
	{
		name: "Martin Mojžiš",
		role: "Full Stack Developer",
		img: "/assets/nasMatej.png",
		portfolio: ""
	},
	{
		name: "Daniel Czaja",
		role: "Back-end Developer",
		img: "/assets/Danci.png",
		portfolio: ""
	},
	{
		name: "Daniel Kliman",
		role: "Back-end Developer",
		img: "/assets/klinec.png",
		portfolio: ""
	}
])
</script>
<style lang="scss" scoped>
ion-card {
	display: flex;
	flex-direction: column;
	align-items: center;

	min-width: 200px;
	max-width: 200px;
	height: 230px;
	border-radius: 2rem;

	transition: all 500ms;

	position: relative;
	margin: 2rem 1rem;
	margin-top: 10vh;
	padding: 1rem;

	scroll-snap-align: center;
	overflow: hidden;

	&:hover {
		height: 340px;
	}

	&:first-of-type {
		margin-left: 15vw;
	}

	&:last-of-type {
		margin-right: 15vw;
	}
}

h1 {
	margin-top: 0;
	text-align: center;
	color: #252525;
	font-family: "Poppins";
	width: 200%;
	font-size: 1.4rem;
}

img {
	transform: scale(0.8);
}

.wrapper {
	scroll-snap-type: x mandatory;
	min-width: 100vw;
	display: flex;
	justify-content: space-between;
	overflow-x: scroll;
	overflow-y: hidden;
	scrollbar-width: none;
}

.wrapper::-webkit-scrollbar {
	display: none;
}

p {
	margin-top: 0;
	color: #2525257a;
	font-family: "Poppins";
	font-size: 1rem;
	text-align: center;
}

.btn {
	width: 180px;
	margin-bottom: 2rem;
}

@media (max-width: 1024px) {
	ion-card {
		height: 340px;

		&:hover {
			height: 340px;
		}

		&:first-of-type {
			margin-left: calc(50vw - 100px);
		}

		&:last-of-type {
			margin-right: calc(50vw - 100px);
		}
	}
}
</style>
