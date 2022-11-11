<template>
	<ion-page>
		<ion-content>
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
						<ion-icon :icon="icons.logoFacebook" id="ic1" />
						<ion-icon :icon="icons.logoInstagram" id="ic2" />
						<ion-icon :icon="icons.logoTwitter" id="ic3" />
						<ion-icon :icon="icons.logoTiktok" id="ic4" />
					</section>
					<!--Button for sending email-->
					<button class="getInTouchBtn" data="Get In Touch"></button>
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
				<Divider id="aboutus">About us</Divider>
				<section class="aboutUs">
					<p class="aboutUsText">
						We are new sofware studio founded by highschool<wbr />
						students from Slovakia.<br />
						Currently we are studying on high school SPŠE Hálova
						16.<br />
						And we are part of really cool study plan named
						<wbr /><a href="https://openlab.sk" target="_blank">
							OPENLAB </a
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

				<Divider id="contact">Contact Us</Divider>
				<section>
					<a
						class="contact"
						href="mailto:space.software.business@gmail.com">
						<img src="/assets/email.svg" />
					</a>
					<p class="contact-desc" v-if="large">
						You can send us an email through this icon!
					</p>
				</section>
				<section class="newsletter">
					<Newsletter v-if="!large" />
				</section>

				<Footer />
			</div>
		</ion-content>
	</ion-page>
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
const email = ref<string>("")
onMounted(async () => {
	const res = await axios.get<{ data: project[] }>(
		"https://space-software.com/cms/api/v1/projects"
	)
	projects.value = res.data.data
})

const newsletterSubmit = () => {
	console.log(email.value)
}
</script>
<style lang="scss" scoped>
.container {
	position: relative;
	height: auto;
	background: linear-gradient(180deg, #ffffff 0%, #cce2ff 100%);
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

.contact {
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100vw;
	height: 100%;
	margin: 0;
	margin-top: 2rem;
}

.contact-desc {
	font-size: 1.5rem;
	font-weight: 600;
	margin: 0;
	margin-top: 1rem;
	width: 100vw;
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
	width: 100vw;
	display: flex;
	flex-direction: column;
	align-items: center;
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
		width: 100vw;
	}
	.logoAbt {
		display: none;
	}

	.aboutUs {
		width: 100vw;
		margin-left: 0;
		padding: 0 1rem;
		justify-content: center;
	}
}
@media screen and (max-width: 1375px) and (min-width: 1161px) {
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
