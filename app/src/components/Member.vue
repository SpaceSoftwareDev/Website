<template>
	<div class="wrapper">
		<ion-card v-for="member in members" :key="member.name">
			<div class="memberPic">
				<img :src="member.img" />
			</div>
			<h1>{{ member.name }}</h1>
			<p>{{ member.role }}</p>
			<button data="Portfolio"></button>
		</ion-card>
	</div>
</template>
<script setup lang="ts">
import { ref } from "vue"
const members = ref([
	{
		name: "Lucas Ligas",
		role: "Front-End Developer",
		img: "/assets/LucasImg.png"
	},
	{
		name: "Jakub Krčmárik",
		role: "Full Stack Developer",
		img: "/assets/krcmarikMalicky.png"
	},
	{
		name: "Martin Mojžiš",
		role: "Full Stack Developer",
		img: "/assets/nasMatej.png"
	},
	{
		name: "Daniel Czaja",
		role: "Back-end Developer",
		img: "/assets/Danci.png"
	},
	{
		name: "Samuel Uhliar",
		role: "Full Stack Developer",
		img: "/assets/medved.png"
	},
	{
		name: "Daniel Kliman",
		role: "Back-end Developer",
		img: "/assets/klinec.png"
	}
])
</script>
<style lang="scss" scoped>
ion-card {
	scroll-snap-type: x proximity;
	margin-top: 10vh;
	display: flex;
	flex-direction: column;
	align-items: center;
	width: 230px;
	height: 230px;
	border-radius: 2rem;
	transition: all 300ms;
	overflow-x: scroll;
}
ion-card:hover {
	height: 350px;
}

h1 {
	margin-top: 0;
	color: #252525;
	font-family: "Poppins";
}

img {
	transform: scale(0.8);
}

.wrapper {
	width: 60%;
	display: grid;
	grid-auto-flow: column;
	grid-auto-columns: 35%;
	-ms-overflow-style: none;
	scrollbar-width: none;
	scroll-snap-type: x mandatory;
	overflow-x: auto;
}
.wrapper::-webkit-scrollbar {
	display: none;
}

p {
	margin-top: 0;
	color: #2525257a;
	font-family: "Poppins";
	font-size: 1rem;
}

button {
	padding: 20px 35px;
	border: none;
	outline: none;
	position: relative;
	z-index: 1;
	border-radius: 22px;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	cursor: pointer;

	font-family: "Poppins", sans-serif;
}
button::before {
	content: "";
	position: absolute;
	left: 3px;
	right: 3px;
	top: 3px;
	bottom: 3px;
	border-radius: 20px;
	background-color: #ffffff;
	z-index: -1;
	transition: 200ms;
}
button::after {
	content: attr(data);
	font-size: 2rem;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	-webkit-background-clip: text;
	color: transparent;
	transition: 200ms;
}
button:hover::before {
	opacity: 10%;
	color: white;
}
button:hover::after {
	color: white;
}

@media (max-width: 1160px) {
	ion-card {
		height: 350px;
		margin-left: 3vw;
	}
	.wrapper {
		grid-auto-columns: 100vw;
		width: 70%;
		scroll-snap-type: x mandatory;
	}
}
</style>
