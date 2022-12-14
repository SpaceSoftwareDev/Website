<template>
	<div class="wrapper">
		<swiper
			class="swipper"
			:pagination="(pagination as any)"
			:slides-per-view="count"
			:virtual="(true as any)">
			<swiper-slide v-for="member in members" :key="member.name">
				<div class="slide">
					<div class="card">
						<div class="memberPic">
							<img alt="avatar" :src="member.avatar.path" />
						</div>
						<h1>{{ member.name }}</h1>
						<p>{{ member.stack[0] }}</p>
						<a
							v-if="member.portfolio_link"
							:href="member.portfolio_link"
							target="_blank">
							<Button class="btn">Portfolio</Button>
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
	height: 220px;
	border-radius: 2rem;
	transition: all 500ms;

	position: relative;
	margin: 2rem 0.5rem;
	margin-top: 10vh;
	padding: 1rem;

	background-color: white;

	scroll-snap-align: center;
	overflow: hidden;

	&:hover {
		height: 260px;
	}
}

h1 {
	margin-top: 0;
	text-align: center;
	color: #252525;
	font-family: "Poppins";
	width: 200%;
	font-size: 1.4rem;
	font-weight: 100;
}

.swiper {
	width: 50vw;
}

.slide {
	width: 100%;
	height: 100%;
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

@media (max-width: 1600px) {
	.card {
		height: 260px;
	}

	.swiper {
		width: 99vw;
	}
}
</style>
