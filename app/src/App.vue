<template>
	<div class="container">
		<NavBar />

		<article>
			<h1 class="landingText">
				Software studio <br />
				founded by <br />
				<strong class="highlightText"> high school students </strong>
			</h1>

			<section class="socials">
				<a
					href="https://facebook.com/profile/100076217131544"
					target="_blank">
					<ion-icon :icon="logos.facebook" id="ic1" />
				</a>
				<a
					href="https://instagram.com/spacesoftwarestudio/"
					target="_blank">
					<ion-icon :icon="logos.instagram" id="ic2" />
				</a>
				<a href="https://twitter.com/spacesoftstudio" target="_blank">
					<ion-icon :icon="logos.twitter" id="ic3" />
				</a>
				<a href="https://tiktok.com/@spacesoftware" target="_blank">
					<ion-icon :icon="logos.tiktok" id="ic4" />
				</a>
			</section>

			<button class="getInTouchBtn" @click="scrollTo('contact')">
				Get In Touch
			</button>
		</article>

		<aside>
			<picture>
				<source type="image/webp" srcset="/assets/tech-stack.webp" />
				<source type="image/png" srcset="/assets/tech-stack.png" />
				<img
					class="illustration"
					alt="Tech Stack Illustration"
					src="/assets/tech-stack.png" />
			</picture>
		</aside>

		<div class="trashDiv"></div>

		<section>
			<div class="scrollDivider">
				<div class="textWrapper">
					<p style="--i: 1" class="letter">S</p>
					<p style="--i: 2" class="letter">C</p>
					<p style="--i: 3" class="letter">R</p>
					<p style="--i: 4" class="letter">O</p>
					<p style="--i: 5" class="letter">L</p>
					<p style="--i: 6" class="letter">L</p>
				</div>
				<div class="scrollLine"></div>
			</div>
		</section>

		<Divider id="about">About us</Divider>
		<section class="aboutUs">
			<p class="aboutUsText">
				<strong>space.</strong> is a software studio founded by high
				school students from Slovakia.<br />
				We are currently attending a high school SPŠE Hálova 16,
				Bratislava,<br />
				where we are also a part of a new study program called
				<a href="https://openlab.sk" target="_blank">
					<strong> OpenLab</strong></a
				>.
			</p>
			<picture>
				<source type="image/webp" srcset="/assets/logo.webp" />
				<source type="image/png" srcset="/assets/logo.png" />
				<img src="/assets/logo.png" class="logo" alt="logo" />
			</picture>
		</section>

		<section class="members">
			<Member />
		</section>

		<Divider id="projects" right>Projects</Divider>
		<section class="projects">
			<Project />
		</section>

		<Divider id="contact">Contact us</Divider>
		<section>
			<a class="contact" href="mailto:info@space-software.com">
				<img src="/assets/email.svg" alt="email" />
			</a>
		</section>

		<section class="newsletter">
			<Newsletter v-if="!large" />
		</section>

		<Footer />
	</div>
</template>

<script setup lang="ts">
import { IonIcon } from "@ionic/vue"
import Footer from "@/components/Footer.vue"
import Newsletter from "@/components/Newsletter.vue"
import {
	logoFacebook,
	logoTwitter,
	logoInstagram,
	logoTiktok
} from "ionicons/icons"
import NavBar from "@/components/NavBar.vue"
import Member from "@/components/Member.vue"
import Divider from "@/components/Divider.vue"
import Project from "@/components/Project.vue"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const large = useBreakpoints(breakpointsTailwind).lg

const logos = {
	facebook: logoFacebook.replace("Logo Facebook", ""),
	instagram: logoInstagram.replace("Logo Instagram", ""),
	twitter: logoTwitter.replace("Logo Twitter", ""),
	tiktok: logoTiktok.replace("Logo Tiktok", "")
}

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
	font-size: 3.7rem;
	font-weight: 600;
}

a,
.highlightText {
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	background-clip: text;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;

	&.highlightText {
		font-weight: 700;
	}
}

.socials {
	display: flex;
	justify-content: space-between;
	width: 50%;
	margin-top: 4vh;
	padding-left: 0.4vw;

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

#ic1,
#ic2,
#ic3,
#ic4 {
	transition: all 200ms ease-in-out;
	color: black;

	&:hover {
		color: #00d1ff;
	}
}

.getInTouchBtn {
	position: relative;
	margin-top: 5vh;
	padding: 20px 60px;
	border-radius: 5rem;
	font-weight: 600;
	font-size: 1.7rem;
	transition: all 200ms ease-in-out;
	filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.4));

	&:hover {
		filter: none;
	}
}

.scrollDivider {
	margin-left: 10rem;
}

.textWrapper {
	margin-top: 8vh;
}

.letter {
	position: relative;
	display: inline-block;
	color: #9cc6ff;
	letter-spacing: 0.5vh;
	font-size: 1.2rem;
	font-weight: 500;
	animation: waveAnim 3s infinite;
	animation-delay: calc(0.1s * var(--i));
}

.scrollLine {
	margin-top: 2vh;
	width: 3px;
	height: 40vh;
	background-color: #cce2ff;
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
	justify-content: space-around;
	align-items: center;
	width: 60%;
	margin: 0 20vw;
}

.aboutUsText {
	padding: 0 1rem;
}

.logo {
	width: 10rem;
	height: 10rem;
}

.members {
	display: flex;
	align-items: center;
	justify-content: center;
}

.contact {
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100%;
	height: 100%;
	margin-top: 2rem;
	animation: pulse 3s infinite;
}

.newsletter {
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: 2.5rem;
	margin-bottom: 2.5rem;
}

@media screen and (max-width: 1024px) {
	.trashDiv {
		margin-top: 0;
	}

	article {
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
		margin-left: 0;
		margin-right: 0;
		font-size: 3.5vh;
		width: 85%;
	}

	.socials {
		text-align: center;
		width: 78%;
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

	.getInTouchBtn {
		padding: 2vh 6vw;
		font-size: 1.3rem;
	}

	.scrollDivider {
		margin-left: 3rem;
	}

	.scrollLine {
		margin-left: 2.4rem;
		height: 30vh;
	}

	.logo {
		display: none;
	}

	.aboutUs {
		width: 100%;
		margin: 0;
		justify-content: center;
	}

	.aboutUsText {
		margin-top: 10vw;
		text-align: center;
		width: 100%;
	}

	.illustration {
		width: min(90vw, 400px);
	}

	.contact {
		img {
			width: 12rem;
			height: 12rem;
		}
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
</style>
