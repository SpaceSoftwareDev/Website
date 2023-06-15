<template>
	<div class="wrapper">
		<h2>Meet our team</h2>
		<img class="arrow" src="/assets/left.svg" @click="left()" :aria-disabled="first" alt="arrowLeft" />
		<img class="arrow" src="/assets/right.svg" @click="right()" :aria-disabled="last" alt="arrowRight" />
		<swiper class="swipper" :pagination="pagination" @onSwiper="inst = $event" @slide-change="console.log" :slides-per-view="count" virtual>
			<swiper-slide v-for="member in members" :key="member.name" v-slot="{ isActive }">
				<div class="slide">
					<div :class="{ card: true, hasLink: !!member.link }">
						<img alt="avatar" :src="member.avatar.path" v-if="!isActive" />
						<h3>{{ member.name }}</h3>
						<p>{{ member.stack.join(", ") }}</p>
						<a v-if="member.link" :href="member.link" aria-label="LinkedIn" target="_blank">
							<icon icon="ion:logo-linkedin" class="icon" />
						</a>
					</div>
				</div>
			</swiper-slide>
		</swiper>
	</div>
</template>
<script setup lang="ts">
import { ref, computed, onMounted } from "vue"
import { Get } from "@/types"

import { Icon } from "@iconify/vue"
import type { TeamMember } from "@/types"

import Swiper from "./Swiper.vue"
import { SwiperSlide } from "swiper/vue"
import { Swiper as Instance } from "swiper"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const breakpoints = useBreakpoints(breakpointsTailwind)

const count = computed(() => {
	if (breakpoints.lg.value) return 3
	if (breakpoints.md.value) return 2
	return 1
})

const inst = ref<Instance>()
const activeIndex = ref(0)
const left = () => {
	inst.value.slidePrev()
	activeIndex.value--
}
const right = () => {
	inst.value.slideNext()
	activeIndex.value++
}
const first = computed(() => activeIndex.value === 0)
const last = computed(() => activeIndex.value === inst.value?.snapGrid.length - 1)

const members = ref<TeamMember[]>([])

const pagination = {
	clickable: true,
	renderBullet(_index: number, className: string) {
		return `<span class="${className} dots"></span>`
	}
}

onMounted(async () => {
	await Get<TeamMember[]>("team").then((res) => {
		members.value = res.data.data
	})
})
</script>
<style lang="scss" scoped>
h2 {
	text-align: center;
	font-weight: 600;
}

.arrow {
	height: 50px;
	position: absolute;
	z-index: 100;
	right: 0;
	opacity: 30%;
	transition: all 500ms ease;
	backdrop-filter: blur(10px);
	margin: 0 12.5vw;
	cursor: pointer;

	&:first-of-type {
		left: 0;
	}

	&:hover {
		scale: 1.1;
		opacity: 50%;
	}

	&[aria-disabled="true"] {
		cursor: not-allowed;
		opacity: 20%;

		&:hover {
			opacity: 20%;
			scale: 1;
		}
	}
}

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

.swiper {
	width: min(65vw, 850px);
}

.slide {
	width: 100%;
	height: 380px;
	display: flex;
	justify-content: center;
	align-items: center;

	img {
		height: 180px;
		width: 180px;
		transform: scale(0.9);
	}

	h3 {
		font-size: 1.5em;
		font-weight: 500;
		margin-top: 0.3rem;
	}

	p {
		margin-top: 0.5rem;
		font-weight: 400;
		text-align: center;
	}

	.icon {
		transition: all 200ms ease-in-out;
		transform: scale(2);
		color: black;

		&:hover {
			color: #00d1ff;
		}
	}
}

.wrapper {
	min-width: 100%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	overflow: hidden;
	margin-top: min(6vh, 2rem);
}

@media (max-width: 1024px) {
	.card {
		height: 260px;

		&.hasLink {
			height: 300px;
		}
	}

	.arrow {
		display: none;
	}

	.swiper {
		width: 99vw;
	}
}
</style>
