<template>
	<!--Content container div-->
	<div class="container">
		<NavBar />

		<!--Whole content of landing page-->
		<article>
			<p class="landingText">
				Software studio <br />
				founded by <br />
				<span class="coloredText"> highschool students </span>
			</p>

			<!--Socials. icons-->
			<section class="socials">
				<a
					href="https://www.facebook.com/profile.php?id=100076217131544"
					target="_blank">
					<ion-icon :icon="icons.logoFacebook" id="ic1" />
				</a>
				<a
					href="https://www.instagram.com/spacesoftwarestudio/"
					target="_blank">
					<ion-icon :icon="icons.logoInstagram" id="ic2" />
				</a>
				<a href="https://twitter.com/spacesoftstudio" target="_blank">
					<ion-icon :icon="icons.logoTwitter" id="ic3" />
				</a>
				<a href="https://www.tiktok.com/@spacesoftware" target="_blank"
					><ion-icon :icon="icons.logoTiktok" id="ic4"
				/></a>
			</section>
			<!--Button for sending email-->
			<button
				class="getInTouchBtn"
				data="Get In Touch"
				@click="scrollTo('contact')"></button>
		</article>
		<!--Right side illustration-->
		<aside>
			<img src="/assets/Illustration.png" class="illustration" />
		</aside>
		<div class="trashDiv"></div>
		<section>
			<div class="scrollDivider">
				<div class="textWrapper">
					<span style="--i: 1" class="letter">S</span>
					<span style="--i: 2" class="letter">C</span>
					<span style="--i: 3" class="letter">R</span>
					<span style="--i: 4" class="letter">O</span>
					<span style="--i: 5" class="letter">L</span>
					<span style="--i: 6" class="letter">L</span>
				</div>
				<div class="scrollLine"></div>
			</div>
		</section>
		<Divider id="about">About us</Divider>
		<section class="aboutUs">
			<p class="aboutUsText">
				We are new software studio founded by high school<wbr /> students
				from Slovakia.<br />
				Currently we are studying on high school SPŠE Hálova 16.<br />
				And we are part of really cool study plan named
				<wbr /><a href="https://openlab.sk" target="_blank"> OPENLAB </a
				>.
			</p>
			<img src="/assets/LogoAbt.png" class="logoAbt" />
		</section>
		<section class="members">
			<Member />
		</section>
		<Divider id="projects" right>Projects</Divider>
		<section class="projects">
			<Project
				v-for="project in projects"
				:key="project.title"
				:data="project" />
		</section>

		<Divider id="contact">Contact us</Divider>
		<section>
			<a class="contact" href="mailto:space.software.business@gmail.com">
				<img src="/assets/email.svg" />
			</a>
		</section>

		<section class="newsletter">
			<Newsletter v-if="!large" />
		</section>

		<Footer />
	</div>
</template>

<script setup lang="ts">
import type { project } from "@/types"
import Footer from "@/components/Footer.vue"
import Newsletter from "@/components/Newsletter.vue"
import * as icons from "ionicons/icons"
import NavBar from "@/components/NavBar.vue"
import Member from "@/components/Member.vue"
import Divider from "@/components/Divider.vue"
import Project from "@/components/Project.vue"
import { ref, onMounted } from "vue"
import axios from "axios"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const large = useBreakpoints(breakpointsTailwind).lg

const projects = ref<project[]>([])
onMounted(async () => {
	const res = await axios.get<{ data: project[] }>(
		`${import.meta.env.VITE_CMS_URL}/api/v1/projects`
	)
	projects.value = res.data.data
})

const scrollTo = (id: string) => {
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
.container {
	position: relative;
	background: linear-gradient(180deg, #ffffff 0%, #cce2ff 100%);
	height: auto;
	max-width: 100%;
	overflow-x: hidden;
}

.getInTouchBtn:hover::after {
	color: white;
}

.trashDiv {
	margin-top: 30rem;
}

article {
	margin-left: 10rem;
	float: left;
}

aside {
	width: 30%;
	height: auto;
	float: right;
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

a {
	background: linear-gradient(101.18deg, #2400ff -13.93%, #8000ff 90.86%);
	background-clip: text;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}

.socials {
	display: flex;
	justify-content: space-between;
	width: 50%;
	margin-top: 3vh;
	padding-left: 1vw;

	ion-icon {
		transform: scale(2);
	}
}

@keyframes pulse {
	0% {
		transform: scale(1);
	}
	50% {
		transform: scale(1.05);
	}
	100% {
		transform: scale(1);
	}
}

.contact {
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100%;
	height: 100%;
	margin: 0;
	margin-top: 2rem;
	animation: pulse 3s infinite;
}

.contact-desc {
	font-size: 1.5rem;
	font-weight: 600;
	margin: 0;
	margin-top: 1rem;
	width: 100%;
	text-align: center;
	color: rgba(0, 0, 0, 0.4);
}

.newsletter {
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: 2.5rem;
	margin-bottom: 2.5rem;
}

#ic1,
#ic2,
#ic3,
#ic4 {
	transition: all 300ms ease-in-out;
	color: black;
}

#ic1:hover,
#ic2:hover,
#ic3:hover,
#ic4:hover {
	color: #00d1ff;
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
	background-color: #f6faff;
	z-index: -1;
	transition: 200ms;
}
.getInTouchBtn::after {
	content: attr(data);
	font-size: 2rem;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	background-clip: text;
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

.scrollDivider {
	margin-left: 10rem;
}

.textWrapper {
	margin-top: 8vh;
	font-size: 1rem;
}

.letter {
	font-family: "Poppins";
	position: relative;
	display: inline-block;
	color: rgba(0, 0, 0, 0.3);
	letter-spacing: 0.5vh;
	animation: waveAnim 3s infinite;
	animation-delay: calc(0.1s * var(--i));
}

.scrollLine {
	margin-top: 2vh;
	width: 0.1vw;
	height: 40vh;
	background-color: rgba(0, 0, 0, 0.2);
	margin-left: 2.5vw;
}

.projects {
	width: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.illustration {
	width: 30vw;
}

@keyframes waveAnim {
	0%,
	40%,
	100% {
		transform: translateY(0);
	}
	20% {
		transform: translateY(-20px);
	}
}

.aboutUs {
	display: flex;
	justify-content: space-between;
	align-items: center;
	width: 60%;
	margin-left: 21vw;
}

.aboutUsText {
	margin: 0;
	color: rgba(0, 0, 0, 0.4);
	font-size: 1.1rem;
	padding: 0 1rem;
}

.logoAbt {
	width: 15vw;
	height: 15vw;
}

.members {
	display: flex;
	align-items: center;
	justify-content: center;
}

@media screen and (max-width: 1024px) {
	.trashDiv {
		margin-top: 0rem;
	}

	article {
		margin-top: -10rem;
		float: none;
		margin: auto;
		display: flex;
		align-items: center;
		text-align: center;
		flex-direction: column;
		justify-content: center;
	}
	.landingText {
		margin-top: 3vh;
		margin-left: 0vw;
		margin-right: 0vw;
		font-size: 3.5vh;
		width: 80%;
	}
	.coloredText {
		font-size: 3.5vh;
	}

	.socials {
		text-align: center;
		width: 78%;
		display: none;
	}

	aside {
		float: none;
		margin: auto;
		display: flex;
		align-items: center;
		text-align: center;
		flex-direction: column;
		justify-content: center;
		width: 80vw;
		height: auto;

		img {
			margin-top: 5vh;
		}
	}

	.contact {
		img {
			width: 12rem;
			height: 12rem;
		}
	}

	.getInTouchBtn {
		display: none;
		margin-top: 4vh;
		padding: 2vh 5vw;
		font-size: 1vh;
	}
	.getInTouchBtn::before {
		left: 4px;
		right: 4px;
		top: 4px;
		bottom: 4px;
	}
	.getInTouchBtn::after {
		content: attr(data);
		font-size: 2rem;
		background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
		background-clip: text;
		-webkit-background-clip: text;
		color: transparent;
		transition: 200ms;
	}

	.scrollDivider {
		margin-left: 3rem;
	}
	.scrollLine {
		margin-left: 2.4rem;
		width: 1px;
		height: 30vh;
	}

	.aboutUsText {
		margin-top: 10vw;
		text-align: center;
		width: 100%;
	}
	.logoAbt {
		display: none;
	}

	.aboutUs {
		width: 100%;
		margin-left: 0;
		justify-content: center;
	}

	.illustration {
		width: min(90vw, 400px);
	}
}
@media screen and (max-width: 1375px) and (min-width: 1024px) {
	aside {
		display: none;
	}
}

@media screen and (min-width: 560px) and (max-width: 1375px) {
	aside {
		width: 400px;
	}
}

@media screen and (min-width: 326px) and (max-width: 425px) {
	.coloredText {
		font-size: 1.7rem;
	}
}
</style>
