<template>
	<div class="project">
		<div v-if="!large" class="title">
			<h1 v-html="data.title" />
			<img class="icon" :src="data.icon.path" />
		</div>
		<swiper class="swipper" :pagination="(pagination as any)">
			<swiper-slide
				class="slide"
				v-for="media in data.gallery"
				:key="media.id">
				<img :src="media?.path" />
			</swiper-slide>
		</swiper>
		<div class="projectInfo">
			<div v-if="large" class="title">
				<h1 v-html="data.title" />
			</div>
			<p v-html="data.description" />
			<img v-if="large" class="icon" :src="data.icon.path" />
		</div>
	</div>
</template>
<script lang="ts" setup>
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

import type { project } from "@/types"
import SwiperCore, { Pagination } from "swiper"
import { Swiper, SwiperSlide } from "swiper/vue"

defineProps<{
	data: project
}>()

const breakpoints = useBreakpoints(breakpointsTailwind)

const large = breakpoints.lg

SwiperCore.use([Pagination])
const pagination = {
	clickable: true,
	renderBullet(_index: number, className: string) {
		return `<span class="${className} dots"></span>`
	}
}
</script>
<style lang="scss" scoped>
.project {
	display: flex;
	width: 80vw;
	flex-direction: row-reverse;
	align-items: center;
	justify-content: center;
	margin: 0;
	padding: 6vh 12vh;
	&:nth-child(odd) {
		flex-direction: row;
	}
}
.projectInfo {
	width: 40vw;
	display: flex;
	flex-direction: column;
	margin-left: 1vw;
}

.swiper {
	height: 460px;
	width: 20vw;

	display: flex;
	align-items: center;
	justify-content: center;

	margin: 0;
	margin-right: 1rem;

	padding-bottom: 20px;

	:global(.swiper-pagination) {
		bottom: 0 !important;
	}

	&:nth-child(odd) {
		margin: 0;
		margin-left: 1rem;
	}

	.slide {
		width: auto;
		height: auto;
		object-fit: cover;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	img {
		max-height: 100%;
		height: auto;
		width: auto;
		object-fit: contain;
	}
}

p {
	margin: 0;
	color: rgba(0, 0, 0, 0.4);
	font-size: 1.1rem;
}

.title {
	display: flex;
	flex-direction: row;
	align-items: center;
	vertical-align: middle;

	.icon {
		width: 6rem;
		height: 6rem;
		margin: 0;
	}
}

.icon {
	width: 10rem;
	height: 10rem;
}

@media (max-width: 1024px) {
	.project {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

		&:nth-child(odd) {
			flex-direction: column;
		}
	}

	.projectInfo {
		width: 90vw;
		align-items: center;
	}

	.swiper {
		width: 80vw;
	}

	.title {
		justify-content: center;
	}
	p {
		text-align: center;
	}

	img {
		margin: 0;
		margin-bottom: 1rem;

		&:nth-child(odd) {
			margin: 0;
			margin-bottom: 1rem;
		}
	}

	h1 {
		text-align: center;
	}
}
</style>
