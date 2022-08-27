<template>
	<ion-header>
		<ion-grid>
			<ion-row class="header">
				<ion-col>
					<ion-row>
						<h1 class="Space-Text Vertical-Center">
							spa
							<img class="Space-Image" src="@/assets/C.svg" />
							e.
						</h1>
					</ion-row>
				</ion-col>

				<ion-col class="Dropdown Vertical-Center">
					<span @click="opened = !opened" class="Hamburger-Menu">
						<img
							src="@/assets/More-Icon.svg"
							alt="Hamburger-Menu"
						/>
					</span>
				</ion-col>
			</ion-row>
			<ion-row>
				<ion-col>
					<div :class="{ SideNav: true, active: opened }">
						<a @click="scrollTo('#About')">About us</a>
						<a @click="scrollTo('#Projects')">Projects</a>
						<a @click="scrollTo('#Contact')">Contact us</a>
					</div>
				</ion-col>
			</ion-row>
		</ion-grid>
	</ion-header>
</template>

<script setup lang="ts">
import { ref } from "vue"

const opened = ref(false)

function scrollTo(el: string) {
	const element = document.querySelector(el)
	if (!element) return
	element.scrollIntoView({
		behavior: "smooth",
		block: "start"
	})
	opened.value = false
}
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Gothic+A1:wght@900&family=Manrope:wght@200;400;700;800&family=Roboto:ital,wght@0,700;1,700&family=Sarina&family=Space+Mono&display=swap");

html,
body,
div,
img {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

.header {
	z-index: 2;
}

h1 {
	font-family: "Gothic A1";
}

ion-grid {
	background-color: white;
	height: 60px;
}

.Space-Image {
	margin-top: 10px;
	margin-left: 2px;
	margin-right: 2px;
}

.Space-Text {
	color: black;
	font-size: 30px;
	font-weight: 700;
	font-style: normal;
	line-height: 36px;
	display: flex;
	margin-left: 20px;
}

.Vertical-Center {
	margin-top: auto;
	margin-bottom: auto;
}

.Hamburger-Menu {
	float: right;
	position: relative;
	margin-right: 20px;
}

.SideNav {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	height: 0px;
	width: 100%;
	position: relative;
	z-index: 1;
	left: 0;
	background-color: white;
	overflow-x: hidden; /* Disable horizontal scroll */
	transition: all 0.5s ease-in-out;
}

.SideNav.active {
	height: 15vh;
}

.SideNav a {
	text-decoration: none;
	display: flex;
	flex-direction: column;
	text-align: center;
	font-size: 25px;
	color: black;
	transition: 0.5s;
	font-family: "Roboto";
	font-weight: 400;
}

.SideNav a:hover {
	color: #818181;
}

.Dropdown {
	position: relative;
	display: inline-block;
}

.container {
	display: inline-block;
	cursor: pointer;
}

.bar1,
.bar2,
.bar3 {
	width: 35px;
	height: 5px;
	background-color: #333;
	margin: 6px 0;
	transition: 0.4s;
}

.change .bar1 {
	-webkit-transform: rotate(-45deg) translate(-9px, 6px);
	transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {
	opacity: 0;
}

.change .bar3 {
	-webkit-transform: rotate(45deg) translate(-8px, -8px);
	transform: rotate(45deg) translate(-8px, -8px);
}
</style>
