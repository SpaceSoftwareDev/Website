<template>
	<swiper :pagination="pagination" :virtual="virtual" :slides-per-view="slidesPerView">
		<slot />
	</swiper>
</template>

<script lang="ts" setup>
import { Swiper } from "swiper/vue"
import SwiperCore, { Pagination, Virtual } from "swiper"

interface PaginationType {
	clickable: boolean
	renderBullet(_index: number, className: string): string
}

const props = defineProps<{
	pagination?: PaginationType
	virtual?: boolean
	slidesPerView?: number
}>()

const modules = []

if (props?.pagination) modules.push(Pagination)
if (props?.virtual) modules.push(Virtual)

SwiperCore.use(modules)
</script>

<style lang="scss" scoped>
:global(.swiper-pagination) {
	bottom: 0 !important;
}

:global(.swiper-pagination-bullet-active) {
	background: linear-gradient(to bottom left, #00d1ff 10%, #007aff 80%) !important;
}
</style>
