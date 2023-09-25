<template>
	<Teleport to="body">
		<Transition name="slide-fade">
			<div v-if="active" class="toast" :class="active?.status">
				<Icon v-if="active?.status === 'success'" class="icon" icon="pajamas:check-circle-filled" />
				<Icon v-if="active?.status === 'info'" class="icon" icon="pajamas:severity-info" />
				<Icon v-if="active?.status === 'error'" class="icon" icon="pajamas:clear" />
				{{ active?.message }}
			</div>
		</Transition>
	</Teleport>
</template>

<script lang="ts" setup>
import { ref } from "vue"
import { useEventBus } from "@vueuse/core"
import { Icon } from "@iconify/vue"

import { Toast } from "#/types"

const bus = useEventBus<"show", Toast>("toasts")
const active = ref<Toast | undefined | null>()
const queue = ref<Toast[]>([])

function show(data: Toast) {
	return new Promise<void>((resolve) => {
		active.value = data
		setTimeout(async () => {
			active.value = null
			if (queue.value.length === 0) {
				active.value = undefined
				return resolve()
			}
			setTimeout(async () => await show(queue.value.shift()), 1000)
		}, 2000)
	})
}

bus.on(async (_, data) => {
	if (active.value !== undefined) queue.value.push(data)
	else await show(data)
})
</script>

<style lang="scss" scoped>
.slide-fade-enter-active {
	transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
	transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
	transform: translateX(20px);
	opacity: 0;
}

.toast {
	position: fixed;
	bottom: 0;
	right: 0;
	margin: 1rem 2rem;

	color: white;
	z-index: 100;
	border-radius: 20px;
	padding: 1rem 1.7rem;

	filter: drop-shadow(16px 16px 20px rgba(0, 0, 0, 25%));

	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: center;

	&.info {
		background-color: #3b8aff;
	}

	&.success {
		background-color: #2cdb55;
	}

	&.error {
		background-color: #ff3b45;
	}

	.icon {
		margin-right: 10px;
	}
}

@media screen and (max-width: 1024px) {
	.toast {
		width: 60vw;
		margin: 1rem auto;
		left: 0;
	}

	.slide-fade-enter-from,
	.slide-fade-leave-to {
		transform: translateY(20px);
	}
}
</style>
