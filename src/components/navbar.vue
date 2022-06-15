/* eslint-disable prettier/prettier */
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
					<img
						id="Hamburger-Menu"
						src="@/assets/More-Icon.svg"
						alt="Hamburger-Menu"
						border="0"
						@click="DropdownMenu"
					/>

					<div id="Dropdown-Menu" class="Dropdown-Content">
						<a href="#">About US</a>
						<a href="#">Projects</a>
						<a href="#">Contact</a>
					</div>
				</ion-col>
			</ion-row>
		</ion-grid>
	</ion-header>
</template>

<script setup lang="ts">
import { IonHeader, IonGrid, IonRow, IonCol } from "@ionic/vue"

const DropdownMenu = async () => {
	document.getElementById("Dropdown-Menu").classList.toggle("Show")
}
</script>

<style lang="scss" scoped>
#Hamburger-Menu {
	float: right;
	position: relative;
	margin-right: 20px;
}

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

.Dropdown {
	position: relative;
	display: inline-block;
}

.Dropdown-Content {
	visibility: hidden;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	overflow: auto;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
	z-index: 1;
	margin-top: 7.5vh;
}

.Dropdown-Content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

.Dropdown a:hover {
	background-color: #ddd;
}

.Show {
	visibility: visible;
}
</style>
