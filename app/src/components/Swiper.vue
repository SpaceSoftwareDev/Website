<template>
	<swiper
		:pagination="(pagination as any)"
		:virtual="(virtual as any)"
		:slides-per-view="(slidesPerView as any)">
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
