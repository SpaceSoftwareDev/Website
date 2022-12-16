<template>
	<div class="wrapper">
		<swiper
			class="swipper"
			:pagination="(pagination as any)"
			:slides-per-view="count"
			:virtual="(true as any)">
			<swiper-slide
				v-for="member in members"
				:key="member.name"
				v-slot="{ isActive }">
				<div class="slide">
					<div :class="{ card: true, hasLink: !!member.link }">
						<div class="memberPic" v-if="!isActive">
							<img alt="avatar" :src="member.avatar.path" />
						</div>
						<h1>{{ member.name }}</h1>
						<p>{{ member.stack.join(", ") }}</p>
						<a
							v-if="member.link"
							:href="member.link"
							target="_blank">
							<Button class="btn">Explore</Button>
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
import type { TeamMember } from "@/types"

import SwiperCore, { Pagination, Virtual } from "swiper"
import { Swiper, SwiperSlide } from "swiper/vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

import Button from "@/components/Button.vue"

const breakpoints = useBreakpoints(breakpointsTailwind)

const count = computed(() => {
	if (breakpoints.lg.value) return 3
	if (breakpoints.md.value) return 2
	return 1
})

const members = ref<TeamMember[]>([])

SwiperCore.use([Pagination, Virtual])
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
	height: 230px;
	border-radius: 2rem;
	transition: all 500ms;

	position: relative;
	margin: 2rem 0.5rem;
	padding: 1rem;

	background-color: white;

	scroll-snap-align: center;
	overflow: hidden;

	&:hover {
		height: 270px;
	}

	&.hasLink:hover {
		height: 350px;
	}
}

h1 {
	margin-top: 0;
	text-align: center;
	color: #252525;
	font-family: "Poppins", sans-serif;
	width: 200%;
	font-size: 1.5rem;
	font-weight: 100;
}

.swiper {
	width: 50vw;
}

.slide {
	width: 100%;
	height: 380px;
	display: flex;
	justify-content: center;
	align-items: center;
}

img {
	transform: scale(0.8);
}

.wrapper {
	min-width: 100%;
	display: flex;
	justify-content: center;
	overflow: hidden;
	margin-top: min(6vh, 2rem);
}

p {
	margin-top: 0;
	color: #2525257a;
	font-family: "Poppins", sans-serif;
	font-size: 1rem;
	text-align: center;
}

.btn {
	width: 180px;
	margin-bottom: 2rem;
}

@media (max-width: 1600px) {
	.card {
		height: 270px;

		&.hasLink {
			height: 350px;
		}
	}

	.swiper {
		width: 99vw;
	}
}
</style>
