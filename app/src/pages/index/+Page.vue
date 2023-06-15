<template>
	<div class="container">
		<Navbar />

		<div class="title">
			<section class="welcome">
				<div class="article">
					<h1 class="landingText">
						Software studio <br />
						founded by <br />
						<strong class="highlightText">high school students</strong>
					</h1>
					<section class="socials">
						<a href="https://facebook.com/profile/100076217131544" aria-label="Facebook" target="_blank">
							<icon icon="ion:logo-facebook" id="ic1" />
						</a>
						<a href="https://instagram.com/spacesoftwarestudio/" aria-label="Instagram" target="_blank">
							<icon icon="ion:logo-instagram" id="ic2" />
						</a>
						<a href="https://twitter.com/spacesoftstudio" aria-label="Twitter" target="_blank">
							<icon icon="ion:logo-twitter" id="ic3" />
						</a>
						<a href="https://tiktok.com/@spacesoftware" aria-label="TikTok" target="_blank">
							<icon icon="ion:logo-tiktok" id="ic4" />
						</a>
					</section>
					<button @click="scrollTo('contact')" aria-label="Get in touch" class="button">Get In Touch</button>
				</div>
				<picture>
					<source type="image/webp" srcset="/assets/tech-stack.webp" />
					<source type="image/png" srcset="/assets/tech-stack.png" />
					<img class="illustration" alt="Tech Stack Illustration" src="/assets/tech-stack.png" />
				</picture>
			</section>

			<section class="scroll">
				<div class="scrollDivider">
					<div class="textWrapper">
						<p style="--i: 1" class="letter">S</p>
						<p style="--i: 2" class="letter">C</p>
						<p style="--i: 3" class="letter">R</p>
						<p style="--i: 4" class="letter">O</p>
						<p style="--i: 5" class="letter">L</p>
						<p style="--i: 6" class="letter">L</p>
					</div>
					<div class="scrollLine" />
				</div>
			</section>
		</div>

		<Divider id="about">About us</Divider>
		<section class="aboutUs">
			<p class="aboutUsText">
				<strong>space.</strong> is a software studio founded by high school students from Slovakia.<br />
				We are currently attending a high school SPŠE Hálova 16, Bratislava,<br />
				where we are also a part of a new study program called
				<a href="https://openlab.sk" target="_blank"> <strong> OpenLab</strong></a
				>.
			</p>
			<picture>
				<source type="image/webp" srcset="/assets/logo.webp" />
				<source type="image/png" srcset="/assets/logo.png" />
				<img src="/assets/logo.png" class="logo" alt="logo" />
			</picture>
		</section>

		<section class="members">
			<Members />
		</section>

		<Divider id="projects" right>Projects</Divider>
		<section class="projects">
			<Project />
		</section>

		<Divider id="contact">Contact us</Divider>
		<section class="contact">
			<input type="text" autocomplete="off" name="text" class="input" placeholder="First name"/>
			<input type="text" autocomplete="off" name="text" class="input" placeholder="Last name"/>
			<input type="text" autocomplete="off" name="text" class="input" placeholder="Email"/>
			<textarea class="input textArea" autocomplete="off" placeholder="Your message"></textarea>
			<button class="button sent">Sent</button>
		</section>

		<section class="newsletter">
			<Newsletter v-if="!large" />
		</section>

		<Footer />
	</div>
</template>

<script setup lang="ts">
import { Icon } from "@iconify/vue"
import { Navbar, Members, Project, Divider, Newsletter, Footer } from "@/components"
import { breakpointsTailwind, useBreakpoints } from "@vueuse/core"

const large = useBreakpoints(breakpointsTailwind).lg

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
	overflow-x: hidden;
}
.button {
	margin-top: 5vh;
	width: 15vw;
	height: 9vh;
	font-size: 1.5rem;
	font-family: "Poppins";
	cursor: pointer;
	position: relative;
	color: #2f81e1;
	border: 2px solid #2f81e1;
	border-radius: 34px;
	background-color: transparent;
	font-weight: 600;
	transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
	overflow: hidden;


}

.button::before {
	content: '';
	position: absolute;
	inset: 0;
	margin: auto;
	width: 50px;
	height: 50px;
	border-radius: inherit;
	scale: 0;
	z-index: -1;
	background-image: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%);
	transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.button:hover::before {
	scale: 10;
}

.button:hover {
	color: #ffffff;
	scale: 1.1;

}
.button:active {
	scale: 1;
}



.sent{
	width: 15vw;
	height: 7vh;
	border-radius: 1.25vw;
	font-size: 1.5rem;
}



.article {
	float: left;
}

.title {
	max-width: 1920px;
	margin: 0 auto;
	display: flex;
	flex-direction: column;

	.welcome {
		padding: 0 3rem;
		display: flex;
		justify-content: space-evenly;
	}
}

section.scroll {
	width: min-content;
	height: fit-content;
	position: relative;
}

.landingText {
	color: black;
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
	justify-content: space-between !important;
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
	font-size: 2rem;
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
	border-radius: 360px;
	font-weight: 600;
	font-size: 1.7rem;
	filter: drop-shadow(3px 3px 3px rgba(0, 0, 0, 0.4));
	transition: all 200ms linear;

	&:hover {
		filter: drop-shadow(0px 0px 0px rgba(0, 0, 0, 0.4));
	}
}

.scrollDivider {
	margin-left: 10rem;
	margin-top: 1rem;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.textWrapper {
	width: fit-content;
	display: flex;
	flex-direction: row;
	margin-top: 8vh;
}

.letter {
	position: relative;
	display: inline-block;
	color: #9cc6ff;
	letter-spacing: 0.5vh;
	font-size: 1rem;
	font-weight: 500;
	animation: waveAnim 3s infinite;
	animation-delay: calc(0.1s * var(--i));
}

.scrollLine {
	margin-top: 2vh;
	width: 3px;
	height: 40vh;
	max-height: 400px;
	background-color: #cce2ff;
}

.projects {
	width: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.illustration {
	width: min(30vw, 500px);
	aspect-ratio: 1;
	margin-left: 10rem;
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
	max-width: 1920px;
	margin: 0 auto;
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

.input {
	margin-bottom: 20px;
	border: none;
	width: 30vw;
	outline: none;
	border-radius: 15px;
	padding: 1em;
	background-color: #ffffff;
	transition: 300ms ease-in-out;
}

.input:focus {
	background-color: white;
	transform: scale(1.05);
	box-shadow: 13px 13px 100px #1b45605f, -13px -13px 100px #ffffff;
}

.textArea{
	height: 17vh;
	resize: none;
}

.sentBtn{
	width: 10vw;
	height: 5vh;
	border-radius: 50vw;
	font-weight: bold;
	font-family: "Poppins";
}

.contact {
		padding-top: 20px;
		text-align: center;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}

.newsletter {
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: 2.5rem;
	margin-bottom: 2.5rem;
}

@media screen and (max-width: 1024px) {
	.title {
		margin: 0;
	}

	.welcome {
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	.article {
		float: none;
		display: flex;
		align-items: center;
		text-align: center;
		flex-direction: column;
		justify-content: center;
		margin-left: 0;
		float: unset;
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

	.getInTouchBtn {
		padding: 2vh 6vw;
		font-size: 1.3rem;
	}

	.scrollDivider {
		margin-left: 3rem;
	}

	.scrollLine {
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
		height: min(90vw, 400px);
		margin-left: 0;
		margin-top: 2rem;
	}


}
@media screen and (max-width: 1375px) and (min-width: 1024px) {
	.illustration {
		display: none;
	}
}
</style>
