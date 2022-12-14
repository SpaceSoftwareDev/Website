<template>
	<div v-for="data in projects" :key="data.id" class="project">
		<div v-if="!large" class="title">
			<h1 v-html="data.title" />
			<img alt="icon" class="icon" :src="data.icon.path" />
		</div>
		<swiper class="swipper" :pagination="(pagination as any)">
			<swiper-slide
				class="slide"
				v-for="media in data.gallery"
				:key="media.id">
				<img alt="media" :src="media?.path" />
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
import { ref } from "vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

import { Get } from "@/types"
import type { project } from "@/types"
import SwiperCore, { Pagination } from "swiper"
import { Swiper, SwiperSlide } from "swiper/vue"

const projects = ref<project[]>([])
Get<project[]>(`${import.meta.env.VITE_CMS_URL}/api/v1/projects`).then(
	(res) => {
		projects.value = res.data.data
	}
)

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
h1 {
	background: linear-gradient(94.81deg, #00b232 3.76%, #048383 41.45%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
	color: transparent;
}
.project {
	display: flex;
	width: 90vw;
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
	width: 20vw;

	display: flex;
	align-items: center;
	justify-content: center;

	margin: 0;
	margin-right: 1rem;

	padding-bottom: 40px;

	:global(.swiper-pagination) {
		bottom: 0 !important;
	}

	&:nth-child(odd) {
		margin: 0;
		margin-left: 1rem;
	}

	.slide {
		width: auto;
		height: 500px;
		object-fit: cover;
		display: flex;
		align-items: center;
		justify-content: center;

		img {
			padding-top: 20px;
			height: 100%;
			object-fit: contain;
		}
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
		width: 100%;
		padding-bottom: 20px;
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
		padding-left: 1rem;
		padding-bottom: 0.5rem;

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
