<template>
	<ion-page>
		<!--Content container div-->
		<div class="container">
			<!--Nav Bar-->
			<header>
				<NavBar />
			</header>
			<!--Right side illustration-->
			<aside>
				<img src="/assets/Illustration.png" class="illustration" />
			</aside>
			<!--Whole content of landing page-->
			<article>
				<p class="landingText">
					Software studio <br />
					founded by <br />
					<span class="coloredText"> highschool students </span>
				</p>
				<!--Socials. icons-->
				<section class="socials">
					<ion-icon :icon="icons.logoFacebook" id="ic1" />
					<ion-icon :icon="icons.logoInstagram" id="ic2" />
					<ion-icon :icon="icons.logoTwitter" id="ic3" />
					<ion-icon :icon="icons.logoTiktok" id="ic4" />
				</section>
				<!--Button for sending email-->
				<button class="getInTouchBtn" data="Get In Touch"></button>
			</article>

			<!-- <footer>
				<Footer />
			</footer> -->
		</div>
	</ion-page>
</template>

<script setup lang="ts">
//import Footer from "@/components/Footer.vue"
import * as icons from "ionicons/icons"
import NavBar from "@/components/NavBar.vue"
</script>
<style lang="scss" scoped>
.container {
	height: 100%;
	background: linear-gradient(180deg, #ffffff 0%, #cce2ff 100%);
}

article {
	margin-left: 10rem;
	margin-right: 10rem;
}

.landingText {
	margin: 0;
	font-size: 3.7rem;
	font-weight: 600;
	font-family: "Poppins";
}

.coloredText {
	font-size: 3.7rem;
	font-weight: 800;
	background: #00d1ff;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	background-clip: text;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	margin-bottom: 0;
	font-family: "Poppins";
}

.socials {
	display: flex;
	justify-content: space-between;
	width: 30%;
	margin-top: 3vh;
	padding-left: 1vw;

	ion-icon {
		transform: scale(2);
	}
}

#ic1,
#ic2,
#ic3,
#ic4 {
	transition: all 300ms ease-in-out;
}

#ic1:hover,
#ic2:hover,
#ic3:hover,
#ic4:hover {
	color: white;
}

.getInTouchBtn {
	margin-top: 5vh;
	padding: 20px 60px;
	border: none;
	outline: none;
	position: relative;
	z-index: 1;
	border-radius: 50rem;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	cursor: pointer;
	font-weight: 800;
	font-family: "Poppins", sans-serif;
}
.getInTouchBtn::before {
	content: "";
	position: absolute;
	left: 5px;
	right: 5px;
	top: 5px;
	bottom: 5px;
	border-radius: 50rem;
	background-color: #dcebff;
	z-index: -1;
	transition: 200ms;
}
.getInTouchBtn::after {
	content: attr(data);
	font-size: 2rem;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	-webkit-background-clip: text;
	color: transparent;
	transition: 200ms;
}
.getInTouchBtn:hover::before {
	opacity: 50%;
	top: 0px;
	right: 0px;
	bottom: 0px;
	left: 0px;
}
.getInTouchBtn:hover::after {
	color: white;
}

aside {
	width: 30%;
	height: auto;
	float: right;
	margin-right: 10rem;
}
</style>
