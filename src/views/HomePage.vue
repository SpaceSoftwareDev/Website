<template>
	<ion-page>
		<ion-content :fullscreen="true">
			<!-- header -->
			<ion-grid>
				<ion-row>
					<ion-col>
						<img
							class="Logo"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/logo-nav-bar.png"
							alt="Space-Logo"
							border="0"
						/>
					</ion-col>
					<ion-col>
						<br />
					</ion-col>
					<ion-col>
						<img
							class="Hamburger-Menu"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/burger-menu.png"
							alt="Hamburger-Menu"
							border="0"
						/>
					</ion-col>
				</ion-row>
			</ion-grid>

			<!-- software studio text -->
			<ion-grid class="Background">
				<ion-row>
					<br />
				</ion-row>
				<div class="Software-Text">
					<h1>
						Software studio <wbr /> founded by three <wbr />
						<mark class="Gradient-Text">highschool students.</mark>
					</h1>
				</div>

				<!-- technologie logos   -->
				<ion-row>
					<div class="Technologies">
						<a href="https://octobercms.com/" target="_blank">
							<img
								id="OCMS"
								src="https://space-software.s3.eu-central-1.amazonaws.com/media/ocms.png"
								alt="October-CMS"
								border="0"
							/>
						</a>
						<a href="https://vuejs.org/" target="_blank">
							<img
								id="Vue"
								src="https://space-software.s3.eu-central-1.amazonaws.com/media/vue.png"
								alt="Vue"
								border="0"
							/>
						</a>
						<a href="https://aws.amazon.com/" target="_blank">
							<img
								id="AWS"
								src="https://space-software.s3.eu-central-1.amazonaws.com/media/aws.png"
								alt="AWS"
								border="0"
							/>
						</a>
						<a href="https://ionicframework.com/" target="_blank">
							<img
								id="Ionic"
								src="https://space-software.s3.eu-central-1.amazonaws.com/media/ionic.png"
								alt="Ionic"
								border="0"
							/>
						</a>
					</div>
				</ion-row>

				<!-- team picture -->
				<ion-row>
					<img
						class="Team"
						src="https://space-software.s3.eu-central-1.amazonaws.com/media/team.png"
						alt="Team"
						border="0"
					/>
				</ion-row>

				<!-- about us text -->
				<ion-row>
					<div class="About-Us">
						<h3>About us</h3>
					</div>
				</ion-row>

				<!-- bottom text -->
				<ion-row>
					<div
						class="Bottom-Text"
						style="padding-left: 5vw; padding-right: 5vw"
					>
						<h2>
							We are little sofware studio founded in 2021 by 3
							highschool students from Slovakia.
						</h2>
						<h2>
							Currently we are studying on high school SPŠE Hálova
							16, Bratislava. And we are part of really cool study
							program named <b>OpenLab</b>.
						</h2>
					</div>
				</ion-row>

				<!-- about us bottom -->
				<ion-row>
					<ion-col>
						<img
							class="Space"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/space.png"
							alt="Space"
							border="0"
						/>
					</ion-col>
					<ion-col></ion-col>
					<ion-col>
						<h5 class="Section-Text"><b>ABOUT US</b></h5>
					</ion-col>
				</ion-row>
				<hr />

				<!-- Projects Section -->
				<!-- projects -->
				<ion-row>
					<h2 class="Center Projects" id="projects">Projects</h2>
				</ion-row>

				<!-- memetimeApp header -->
				<ion-row class="Center">
					<img
						class="Meme-Time-Header"
						src="https://space-software.s3.eu-central-1.amazonaws.com/media/memetime-header.png"
						alt="Meme-Time-Header"
						border="0"
					/>
				</ion-row>

				<!-- memetimeapp mockup-->
				<ion-row>
					<img
						class="Meme-Time-Mockup"
						src="https://space-software.s3.eu-central-1.amazonaws.com/media/memetimeapp-screens.png"
						alt="Screens"
						border="0"
					/>
				</ion-row>

				<!-- memetime gradient text -->
				<ion-row>
					<div class="Meme-Time-Gradient">
						<a
							href="https://memetimeapp.space-software.com/"
							target="_blank"
						>
							<h3>MemeTime!</h3>
						</a>
					</div>
				</ion-row>

				<!-- memetimeapp bottom text -->
				<ion-row>
					<div
						class="Bottom-Text"
						id="MemeTime-Bottom-Text"
						style="padding-left: 5vw; padding-right: 5vw"
					>
						<h2>
							MemeTime! is our first project and it’s a new
							application for mobile devices.
						</h2>
						<h2>
							MemeTime! points out that this is never the bad time
							to improve your day. The focus of our platform is
							simple and obvious - just memes and other fun
							content without any limits or censorship.
						</h2>
						<h2>
							Purpose of MemeTime! is to make your day better with
							daily memes of your taste.
						</h2>
					</div>
				</ion-row>

				<!-- projects section bottom -->
				<ion-row>
					<ion-col>
						<img
							class="Space"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/space.png"
							alt="Space"
							border="0"
						/>
					</ion-col>
					<ion-col></ion-col>
					<ion-col>
						<h5 class="Section-Text"><b>PROJECTS</b></h5>
					</ion-col>
				</ion-row>
				<hr />

				<!-- Contantact Us Section-->
				<!-- contact us globe-->
				<ion-row>
					<img
						id="Globe-Img"
						class="Center"
						src="https://space-software.s3.eu-central-1.amazonaws.com/media/globe.png"
						alt="Saly-44"
						border="0"
					/>
				</ion-row>

				<!-- contact text -->
				<ion-row>
					<div id="Contact-Text" class="Center">
						<h3>Contact</h3>
					</div>
				</ion-row>

				<!-- space email -->
				<ion-row>
					<div id="Space-Mail" class="Center">
						<a
							href="mailto:business@space-software.com?subject=Mail%20from%20our%20Website&body=Dear%20Space%20Software%20Team%2C"
						>
							<h5 id="Space-Mail-Text">
								business@space-software.com
							</h5>
						</a>
					</div>
				</ion-row>

				<!-- email icon -->
				<ion-row>
					<a
						href="mailto:business@space-software.com?subject=Mail%20from%20our%20Website&body=Dear%20Space%20Software%20Team%2C"
						class="Center"
					>
						<img
							class="Email-Icon center"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/mail-outline.png"
							alt="mail-outline"
							border="0"
						/>
					</a>
				</ion-row>

				<!-- contact us bottom -->
				<ion-row>
					<ion-col>
						<img
							class="Space"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/space.png"
							alt="Space"
							border="0"
						/>
					</ion-col>
					<ion-col></ion-col>
					<ion-col>
						<h5 class="Section-Text"><b>CONTACT</b></h5>
					</ion-col>
				</ion-row>
				<hr />
			</ion-grid>

			<!-- footer -->
			<ion-grid>
				<!-- social medias -->
				<ion-row class="Social-Medias">
					<a
						href="https://www.facebook.com/space-Software-Studio-108894994970173"
						target="_blank"
					>
						<img
							id="Facebook"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/facebook.png"
							alt="Right"
							border="0"
						/>
					</a>
					<a
						href="https://www.instagram.com/spacesoftwarestudio/"
						target="_blank"
						><img
							id="Instagram"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/instagram.png"
							alt="Right"
							border="0"
						/>
					</a>
					<a
						href="https://twitter.com/spacesoftstudio"
						target="_blank"
						><img
							id="Twitter"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/twitter.png"
							alt="Right"
							border="0"
						/>
					</a>
					<a
						href="https://www.tiktok.com/@spacesoftware?lang=en"
						target="_blank"
						><img
							id="Tik-Tok"
							src="https://space-software.s3.eu-central-1.amazonaws.com/media/tiktok.png"
							alt="Right"
							border="0"
						/>
					</a>
				</ion-row>
				<!-- space row -->
				<ion-row>
					<h5 class="Center" id="Space-Footer">space.</h5>
				</ion-row>
				<!-- all rights reserved -->
				<ion-row>
					<h5 class="Center" id="All-Rights-Reserved">
						Ⓒ {{ new Date().getFullYear() }} All rights reserved
					</h5>
				</ion-row>
			</ion-grid>
		</ion-content>
	</ion-page>
</template>

<script setup lang="ts">
import { IonContent, IonPage, IonGrid, IonRow, IonCol } from "@ionic/vue"
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
	font-size: 31px;
	font-family: "Helvetica";
	font-weight: 800;
}

h2 {
	font-family: "Roboto";
	font-size: 14px;
	font-weight: 500;
	margin-top: -1vh;
	text-align: left;
}

h3 {
	color: #2f2f2f;
	font-family: Helvetica;
	font-size: 24px;
	font-weight: 800;
	line-height: 30px;
}

h6 {
	font-family: "Helvetica";
	font-weight: 800;
	font-size: 10px;
	margin: 0.2vh;
}

hr {
	margin-top: -0.5vh;
	border: 1px solid rgba(187, 217, 255, 0.6);
	height: 0px;
	width: 90%;
	text-align: center;
}

#OCMS {
	width: 18px;
	height: 20.78px;
}

#Vue {
	width: 25.89px;
	height: 20.78px;
}

#AWS {
	width: 37.78px;
	height: 21.78px;
}

#Ionic {
	width: 22.43px;
	height: 24px;
}

#Text {
	margin-top: 1vh;
}

#MemeTime-Bottom-Text {
	margin-top: -6vh;
}

.Projects {
	font-weight: 100px;
	font-size: 24px;
	font-family: "Helvetica";
	font-weight: 800;
}

#M {
	margin-left: auto;
}

#MemeTime-Bottom-Text {
	margin-top: -6vh;
}

#Globe-Img {
	width: 202px;
	height: 171.22px;
	margin-top: 4vh;
}

#Contact-Text {
	font-weight: 400px;
}

#Space-Mail {
	margin-top: -2vh;
}

#Space-Mail-Text {
	color: black;
	text-decoration: none;
	font-size: 19px;
	font-weight: 400px;
	font-family: "Space Mono", monospace;
}

#Facebook {
	width: 18px;
	height: 17px;
}

#Instagram {
	width: 18px;
	height: 17px;
}

#Twitter {
	width: 18px;
	height: 17px;
}

#Tik-Tok {
	width: 18px;
	height: 17px;
}

#Space-Footer {
	font-family: "Space Mono", monospace;
	font-weight: 800;
	font-size: 17px;
	margin-top: 1vh;
}

#All-Rights-Reserved {
	font-family: "Space Mono", monospace;
	font-size: 13px;
	font-weight: 400px;
	margin-top: 0vh;
}

.Background {
	background-image: linear-gradient(white, #cce2ff 160%);
}

.Logo {
	width: 104px;
	height: 36px;
	margin-left: 4vw;
	margin-top: 2.5vh;
}

.Hamburger-Menu {
	float: right;
	width: 31px;
	height: 20px;
	margin-top: 3.9vh;
	margin-right: 4vw;
}

.Software-Text {
	margin-top: 2vh;
	text-align: center;
}

.Gradient-Text {
	margin-top: 0vh;
	background: -webkit-linear-gradient(360deg, #00d1ff 40%, #0209b5 85%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
}

.Technologies {
	display: flex;
	justify-content: space-around;
	width: 90vw;
	margin-left: auto;
	margin-right: auto;
	margin-top: 2vh;
	max-width: 450px;
}

.Team {
	margin-left: auto;
	margin-right: auto;
	margin-top: 5vh;
	width: 339px;
	height: 228px;
}

.About-Us {
	top: 0%;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	font-style: normal;
}

.Bottom-Text {
	margin-top: 2vh;
	margin-right: auto;
	color: rgba(0, 0, 0, 0.4);
	padding-right: 10vw;
	text-align: center;
	h2 {
		text-align: center;
	}
}

.Space {
	width: 27px;
	height: 11.39px;
	margin-left: 4vw;
	margin-top: 3vh;
}

.Section-Text {
	color: rgba(204, 226, 255, 1);
	margin-top: 2.4vh;
	text-align: right;
	padding-right: 2.5vw;
	font-size: 16px;
}

.Center {
	text-align: center;
	margin-right: auto;
	margin-left: auto;
}

.Meme-Time-Header {
	margin-right: auto;
	margin-left: auto;
	margin-top: 1vw;
	margin-bottom: 2vw;
	height: 80px;
}

.Meme-Time-Mockup {
	margin-right: auto;
	margin-left: auto;
	margin-top: -15vh;
	width: 380px;
	height: 482px;
	margin-bottom: 2vh;
}

.Meme-Time-Gradient {
	background: -webkit-linear-gradient(420deg, #00b232 45%, #048383 85%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
	margin-top: -16vh;
	width: 100vw;
	font-style: normal;
	h3 {
		text-align: center;
	}
}

.Email-Icon {
	width: 70px;
	margin-left: auto;
	margin-right: auto;
}

.Social-Medias {
	display: flex;
	justify-content: space-around;
	width: 90vw;
	margin-left: auto;
	margin-right: auto;
	margin-top: 1.5vh;
}
</style>
