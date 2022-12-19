<template>
	<div class="wrapper">
		<h2>Meet our team</h2>
		<swiper
			class="swipper"
			:pagination="pagination"
			:slides-per-view="count"
			virtual>
			<swiper-slide
				v-for="member in members"
				:key="member.name"
				v-slot="{ isActive }">
				<div class="slide">
					<div :class="{ card: true, hasLink: !!member.link }">
						<div class="memberPic" v-if="!isActive">
							<img
								alt="avatar"
								:src="member.avatar.path"
								loading="lazy" />
						</div>
						<h1>{{ member.name }}</h1>
						<p>{{ member.stack.join(", ") }}</p>
						<a
							v-if="member.link"
							:href="member.link"
							target="_blank">
							<ion-icon :icon="linkedin" class="icon" />
						</a>
					</div>
				</div>
			</swiper-slide>
		</swiper>
	</div>
</template>
<script setup lang="ts">
import { ref, computed } from "vue"
import { Get } from "@/types"

import { IonIcon } from "@ionic/vue"
import { logoLinkedin } from "ionicons/icons"

import type { TeamMember } from "@/types"

import Swiper from "./Swiper.vue"
import { SwiperSlide } from "swiper/vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const breakpoints = useBreakpoints(breakpointsTailwind)

const count = computed(() => {
	if (breakpoints.lg.value) return 3
	if (breakpoints.md.value) return 2
	return 1
})

const members = ref<TeamMember[]>([])
const linkedin = logoLinkedin.replace("Logo Linkedin", "")

const pagination = {
	clickable: true,
	renderBullet(_index: number, className: string) {
		return `<span class="${className} dots"></span>`
	}
}

Get<TeamMember[]>(`${import.meta.env.VITE_CMS_URL}/api/v1/team`).then((res) => {
	members.value = res.data.data
})
</script>
<style lang="scss" scoped>
.card {
	display: flex;
	flex-direction: column;
	align-items: center;

	min-width: 200px;
	max-width: 200px;
	height: 220px;
	border-radius: 2rem;
	transition: all 500ms;

	position: relative;
	margin: 2rem 0.5rem;
	padding: 1rem;

	background-color: white;

	scroll-snap-align: center;
	overflow: hidden;

	&:hover {
		height: 260px;
	}

	&.hasLink:hover {
		height: 300px;
	}
}

img {
	height: 180px;
	width: 180px;
	transform: scale(0.8);
}

h1 {
	margin-top: 0;
	margin-bottom: 0.5rem;
	text-align: center;
	color: #2f2f2f;
	font-family: "Poppins", sans-serif;
	width: 200%;
	font-size: 1.5rem;
	font-weight: 100;
}

p {
	margin-top: 0;
	color: #2f2f2f7a;
	font-family: "Poppins", sans-serif;
	font-size: 1rem;
	font-weight: 100;
	text-align: center;
}

ion-icon {
	transform: scale(2);
	margin-top: 0.25rem;
}

.icon {
	transition: all 300ms ease-in-out;
	color: black;

	&:hover {
		color: #00d1ff;
	}
}

.swiper {
	width: min(65vw, 850px);
}

.slide {
	width: 100%;
	height: 380px;
	display: flex;
	justify-content: center;
	align-items: center;
}

.wrapper {
	min-width: 100%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	overflow: hidden;
	margin-top: min(6vh, 2rem);

	h2 {
		color: #2f2f2f;
		margin-bottom: 0;
		font-weight: 600;
	}
}

@media (max-width: 1024px) {
	.card {
		height: 260px;

		&.hasLink {
			height: 300px;
		}
	}

	.swiper {
		width: 99vw;
	}
}
</style>
