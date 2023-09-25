<template>
	<div v-for="data in projects" :key="data.id" class="project">
		<div v-if="!large" class="title">
			<h1 v-html="data.title" />
			<img alt="icon" class="icon" :src="data.icon.path" />
		</div>
		<swiper class="swipper" :pagination="pagination">
			<swiper-slide class="slide" v-for="media in data.gallery" :key="media.id">
				<img alt="media" :src="media?.path" />
			</swiper-slide>
		</swiper>
		<div class="projectInfo">
			<div v-if="large" class="title">
				<h1 v-html="data.title" />
			</div>
			<p v-html="data.description" />
			<img v-if="large" class="icon" :src="data.icon.path" alt="icon" />
		</div>
	</div>
</template>
<script lang="ts" setup>
import { ref, onMounted } from "vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

import { Get } from "#/types"
import type { project } from "#/types"
import Swiper from "./Swiper.vue"
import { SwiperSlide } from "swiper/vue"

const projects = ref<project[]>([])

onMounted(async () => {
	await Get<project[]>("projects").then((res) => {
		projects.value = res.data.data
	})
})

const breakpoints = useBreakpoints(breakpointsTailwind)

const large = breakpoints.lg

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
	font-size: 2rem;
	margin: 0.5rem 0;
}

.project {
	display: flex;
	width: 90vw;
	max-width: 1900px;
	flex-direction: row-reverse;
	align-items: center;
	justify-content: center;
	margin: 0 auto;
	padding: 6vh 12vh;

	&:nth-child(odd) {
		flex-direction: row;
	}
}

.projectInfo {
	width: 40vw;
	max-width: 800px;
	display: flex;
	flex-direction: column;
	margin-left: 1vw;
}

.swiper {
	width: 20vw;

	display: flex;
	align-items: center;
	justify-content: center;

	margin: 0 1rem 0 0;

	padding-bottom: 40px;

	&:nth-child(odd) {
		margin: 0 0 0 1rem;
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
	margin-top: 1rem;
}

@media (max-width: 1024px) {
	.project {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		margin: 0;

		&:nth-child(odd) {
			flex-direction: column;
		}
	}

	.projectInfo {
		width: 90vw;
		align-items: center;
	}

	.swiper {
		padding: 0;
		margin: 0;
		width: 100vw;
		padding-bottom: 20px;
	}

	.title {
		justify-content: center;
		flex-direction: column;

		.icon {
			margin: 1rem 0;
			margin-top: 0.25rem;
		}
	}

	h1 {
		font-size: 3.5vh;
		text-align: center;
	}

	p {
		text-align: center;
	}
}
</style>
