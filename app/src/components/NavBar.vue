<template>
	<!--Whole header-->
	<header ref="header">
		<!--Space Logo-->
		<img src="/assets/logo-nav-bar.svg" class="logo" />
		<!--Navigation links-->
		<nav id="navLinks" ref="dropDown">
			<p>About us</p>
			<p>Projects</p>
			<p>Contact us</p>
		</nav>
		<!--More icon for mobile devices-->
		<a href="#" class="moreButton" ref="toggle" id="morebtn">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</a>
	</header>
	<!--Trash div for spacing when page 1st load on mobile-->
	<div id="trashDiv" ref="trashDiv"></div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue"

// Html elements for changes
const toggle = ref<HTMLAnchorElement>(null)
const dropDown = ref<HTMLElement>(null)
const trashDiv = ref<HTMLDivElement>(null)

// variable for loading first dropdown
let clicks = 0

// toggle function between active and not active dropdown
const superToggle = function (
	element: HTMLElement,
	active: string,
	deactive: string
) {
	element.classList.toggle(active)
	element.classList.toggle(deactive)
}

/**
 * ! Rewrite to use `@click=""` instead
 */
// dropdown function
onMounted(() => {
	toggle.value.addEventListener("click", () => {
		if (clicks == 0) {
			dropDown.value.classList.add("deactive")
		}
		clicks++
		superToggle(dropDown.value, "active", "deactive")
		// deleting trash div for different spacing
		trashDiv.value.remove()
	})
})
</script>
<style lang="scss" scoped>
header {
	height: 20vh;
	margin-left: 5rem;
	margin-right: 5rem;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
}

.logo {
	width: 10rem;
	height: auto;
}

.moreButton {
	display: none;
	flex-direction: column;
	justify-content: space-between;
	width: 30px;
	height: 21px;
	.bar {
		height: 3px;
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
	p {
		transition: all 300ms;
		font-family: "Space Mono", monospace;
	}
}

nav :hover {
	letter-spacing: 0.1rem;
}

// Styling for tablets and mobile devices

@media (max-width: 1160px) {
	#trashDiv {
		height: 6rem;
		width: 100%;
	}
	.moreButton {
		display: flex;
		margin-top: 2.4rem;
	}

	nav {
		display: none;
		flex-direction: column;
		width: 10rem;

		margin-left: -6rem;
	}

	header {
		height: auto;
		margin-left: 10vw;
		margin-right: 10vw;
	}

	.logo {
		margin-top: 2.4rem;
		width: 8rem;
		height: 2rem;
	}

	nav.active {
		display: flex;
		animation: growDown 600ms ease-in-out normal forwards;
		transform-origin: top center;

		@keyframes growDown {
			0% {
				transform: scaleY(0);
			}

			80% {
				transform: scaleY(1.1);
			}

			100% {
				transform: scaleY(1);
				margin-top: 4rem;
			}
		}
	}

	nav.deactive {
		display: flex;
		animation: dissappear 600ms ease-out reverse forwards;
		transform-origin: top center;
		@keyframes dissappear {
			0% {
				transform: scaleY(0);
			}

			80% {
				transform: scaleY(1.1);
			}

			100% {
				transform: scaleY(1);
				margin-top: 4rem;
			}
		}
	}
}
</style>
