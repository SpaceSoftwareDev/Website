<template>
	<!--Whole header-->
	<header>
		<div class="container">
			<!--Space Logo-->
			<img src="/assets/logo-nav-bar.svg" class="logo" />
			<!--Navigation links-->
			<nav v-if="isLarge">
				<a href="#aboutus" @click.prevent="scrollTo('aboutus')">
					About us
				</a>
				<a href="#projects" @click.prevent="scrollTo('projects')">
					Projects
				</a>
				<a href="#contact" @click.prevent="scrollTo('contact')">
					Contact us
				</a>
			</nav>
			<!--More icon for mobile devices-->
			<button class="moreButton" v-if="!isLarge" @click="open = !open">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
		</div>
		<Transition name="scale">
			<nav v-if="!isLarge && open" id="navLinks">
				<a href="#aboutus" @click.prevent="scrollTo('aboutus')">
					About us
				</a>
				<a href="#projects" @click.prevent="scrollTo('projects')">
					Projects
				</a>
				<a href="#contact" @click.prevent="scrollTo('contact')">
					Contact us
				</a>
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
	min-height: 20vh;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	transition: all 300ms;
}

.container {
	width: 100%;
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: space-between;
	margin-top: 2.4rem;
}

.logo {
	width: 10rem;
	height: auto;
	margin-left: 5rem;
}

.moreButton {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	width: 40px;
	height: 21px;
	background: none;
	border: none;
	margin-right: 5rem;
	.bar {
		height: 3px !important;
		width: 100%;
		background-color: #7a7a7a;
		border-radius: 10px;
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
		transition: all 300ms;
		font-family: "Space Mono", monospace;
		text-decoration: none;
		color: black;
		&:hover {
			letter-spacing: 0.1rem;
		}
	}
}

// Styling for tablets and mobile devices

@media (max-width: 1024px) {
	.container {
		margin-top: 1rem;
	}

	header {
		min-height: 5vh;
		width: 100%;
	}

	.logo {
		width: 8rem;
		height: 2rem;
	}

	nav {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		width: 100%;
		margin: 0;
		margin-top: 0.5rem;
		margin-bottom: 1rem;
		a {
			width: 90%;
			padding: 0.5rem 0;
			border-top: 1px solid #7a7a7a43;
		}
	}

	.logo {
		margin-left: 2rem;
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
