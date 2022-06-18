<template>
	<ion-header>
		<ion-grid>
			<ion-row>
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
					<div id="mySidenav" class="SideNav">
						<a
							href="javascript:void(0)"
							class="CloseBtn"
							@click="closeNav()"
							>&times;</a
						>
						<a href="#about-us">About us</a>
						<a href="#projects">Projects</a>
						<a href="#contact-us">Contact us</a>
					</div>

					<!-- Use any element to open the sidenav -->
					<span @click="openNav()" class="Hamburger-Menu">
						<img
							src="@/assets/More-Icon.svg"
							alt="Hamburger-Menu"
						/>
					</span>
				</ion-col>
			</ion-row>
		</ion-grid>
	</ion-header>
</template>

<script setup lang="ts">
function openNav() {
	document.getElementById("mySidenav").style.width = "100%"
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0"
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
	height: 20%;
	width: 0; /* 0 width - change this with JavaScript */
	position: fixed;
	z-index: 1;
	left: 0;
	margin-top: 40px;
	background-color: white;
	overflow-x: hidden; /* Disable horizontal scroll */
	padding-top: 20px; /* Place content from the top */
	transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

.SideNav a {
	padding: 8px 4px 4px 32px;
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

/* Position and style the close button (top right corner) */
.SideNav .CloseBtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
}

.Dropdown {
	position: relative;
	display: inline-block;
}
</style>
