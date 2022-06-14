<template>
	<ion-header>
		<ion-grid>
			<ion-row>
				<ion-col>
					<ion-row>
						<h1 class="Space-Text">
							spa
							<img class="Space-Image" src="@/assets/C.svg" />
							e.
						</h1>
					</ion-row>
				</ion-col>

				<ion-col class="Dropdown">
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
	font-family: "SF Mono";
}

ion-grid {
	background-color: white;
	//opacity: 0.9;
}

#Hamburger-Menu {
	float: right;
	align-items: center;
	position: relative;
	top: 50%;
	-ms-transform: translateY(-50%);
	transform: translateY(-50%);
	margin-right: 20px;
}

.Space-Image {
	margin-top: 15px;
}

.Space-Text {
	color: black;
	line-height: 35.8px;
	font-size: 30px;
	font-weight: 700;
	font-style: normal;
	line-height: 36px;
	display: flex;
	align-items: center;
	margin-left: 20px;
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
