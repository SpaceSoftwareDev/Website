<template>
	<div class="wrapper">
		<ion-card v-for="member in members" :key="member.name">
			<div class="memberPic">
				<img :src="member.avatar.path" />
			</div>
			<h1>{{ member.name }}</h1>
			<p>{{ member.stack[0] }}</p>
			<a
				v-if="member.portfolio_link"
				:href="member.portfolio_link"
				target="_blank">
				<Button class="btn">Portfolio</Button>
			</a>
		</ion-card>
	</div>
</template>
<script setup lang="ts">
import { ref, onMounted } from "vue"
import type { TeamMember, CMSData } from "@/types"
import Button from "@/components/Button.vue"
import axios from "axios"

const members = ref<TeamMember[]>([])

onMounted(async () => {
	const { data } = await axios.get<CMSData<TeamMember>>(
		`${import.meta.env.VITE_CMS_URL}/api/v1/team`
	)
	members.value = data.data
})
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
		height: 260px;
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
		height: 260px;

		&:hover {
			height: 260px;
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