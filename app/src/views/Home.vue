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
				<div class="icons"><p>*ICONS*</p></div>
				<!--Button for sending email-->
				<button>Get In Touch</button>
			</article>

			<!-- <footer>
				<Footer />
			</footer> -->
		</div>
	</ion-page>
</template>

<script setup lang="ts">
import { NavBar } from "@/components"
// import Footer from "@/components/Footer.vue"
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
}

.coloredText {
	font-size: 3.9rem;
	font-weight: 800;
	background: #00d1ff;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	background-clip: text;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}

.icons {
	height: 5rem;
	width: 25rem;
	border: solid 1px #000;
}

button {
	width: 20rem;
	height: 5rem;
	background-color: none;
	border-radius: 50rem;
}

aside {
	width: 27%;
	height: auto;
	float: right;
	margin-right: 10rem;
}
</style>
