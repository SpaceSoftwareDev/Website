<template>
	<header>
		<div class="container">
			<a href="https://space-software.com/" class="logo">
				<img alt="logo" src="/assets/space-logo.svg" />
			</a>
			<nav v-if="isLarge">
				<a href="#about" @click.prevent="scrollTo('about')"> About us </a>
				<a href="#projects" @click.prevent="scrollTo('projects')"> Projects </a>
				<a href="#contact" @click.prevent="scrollTo('contact')"> Contact us </a>
			</nav>
			<button class="moreButton" v-if="!isLarge" @click="open = !open">
				<span class="bar" />
				<span class="bar" />
				<span class="bar" />
			</button>
		</div>
		<Transition name="scale">
			<nav v-if="!isLarge && open" id="navLinks">
				<a href="#about" @click.prevent="scrollTo('about')"> About us </a>
				<a href="#projects" @click.prevent="scrollTo('projects')"> Projects </a>
				<a href="#contact" @click.prevent="scrollTo('contact')"> Contact us </a>
			</nav>
		</Transition>
	</header>
</template>

<script setup lang="ts">
import { ref } from "vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const isLarge = useBreakpoints(breakpointsTailwind).lg

const open = ref(false)

const scrollTo = (id: string) => {
	open.value = false
	const element = document.getElementById(id)
	if (!element) return
	const rect = element.getBoundingClientRect()
	window.scroll({
		top: rect.top + window.scrollY - 65,
		left: 0,
		behavior: "smooth"
	})
}
</script>
<style lang="scss" scoped>
header {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	align-items: center;
	transition: all 300ms;
	max-width: 1920px;
	margin: 0 auto;

	.container {
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: space-between;
		margin-top: 2.4rem;
		width: 100%;
		max-width: 1920px;
	}
}

.logo {
	display: flex;
	flex-direction: column;
	justify-content: center;

	img {
		width: 10rem;
		height: auto;
		margin-left: 5rem;
	}
}

.moreButton {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	width: 38px;
	height: 28px;
	background: none;
	border: none;
	margin-right: 5rem;

	.bar {
		height: 3px !important;
		width: 100%;
		background-color: #7a7a7a;
		border-radius: 10px;

		&:first-of-type {
			margin-top: 2px;
		}

		&:last-of-type {
			margin-bottom: 2px;
		}
	}
}

nav {
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: space-between;
	text-align: center;
	width: 30%;
	margin-right: 5rem;

	a {
		width: 200px;
		transition: all 300ms;
		text-decoration: none;
		color: black;
		&:hover {
			letter-spacing: 0.1rem;
		}
	}
}

// Styling for tablets and mobile devices

@media (max-width: 1024px) {
	header {
		min-height: 5vh;
	}

	.logo {
		img {
			width: 8rem;
			height: 2rem;
			margin-left: 2rem;
		}
	}

	nav {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		width: 100%;
		margin: 0.5rem 0 1rem;

		a {
			width: 90%;
			padding: 0.5rem 0;
			border-top: 1px solid #7a7a7a43;
		}
	}

	.moreButton {
		margin-right: 2rem;
	}
}

@keyframes growDown {
	0% {
		transform: scaleY(0);
	}

	80% {
		transform: scaleY(1.1);
	}

	100% {
		transform: scaleY(1);
	}
}

@keyframes dissappear {
	0% {
		transform: scaleY(0);
	}

	80% {
		transform: scaleY(1.1);
	}

	100% {
		transform: scaleY(1);
	}
}

.scale-enter-active {
	animation: growDown 300ms ease-in-out normal forwards;
	transform-origin: top center;
}

.scale-leave-active {
	animation: dissappear 300ms ease-out reverse forwards;
	transform-origin: top center;
}
</style>
