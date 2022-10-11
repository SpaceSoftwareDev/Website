<template>
	<ion-page>
		<ion-content fullscreen>
			<ion-grid class="Background" id="About">
				<ion-row>
					<div class="Software-Text-Grid Center">
						<h1 class="Software-Text">
							Software studio founded by three
						</h1>
						<h1 class="Gradient-Text Software-Text">
							highschool students.
						</h1>
					</div>
				</ion-row>

				<!-- technologies logo   -->
				<ion-row>
					<div class="Technologies Center">
						<a href="https://octobercms.com/" target="_blank">
							<img
								src="@/assets/OctoberCMS.svg"
								alt="October-CMS"
								border="0"
							/>
						</a>

						<a href="https://vuejs.org/" target="_blank">
							<img src="@/assets/Vue.svg" alt="Vue" border="0" />
						</a>

						<a href="https://aws.amazon.com/" target="_blank">
							<img src="@/assets/AWS.svg" alt="AWS" border="0" />
						</a>

						<a href="https://ionicframework.com/" target="_blank">
							<img
								src="@/assets/Ionic.svg"
								alt="Ionic"
								border="0"
							/>
						</a>
					</div>
				</ion-row>

				<!-- team picture -->
				<ion-row>
					<img
						class="Team Center"
						src="@/assets/Team.svg"
						alt="Team"
						border="0"
					/>
				</ion-row>

				<!-- about us text -->
				<ion-row>
					<div id="about-us" class="Section-Header Center">
						<h1>About us</h1>
					</div>
				</ion-row>

				<!-- about us bottom text -->
				<ion-row>
					<div class="Bottom-Grid Center">
						<h1 class="Bottom-Text">
							We are little sofware studio founded in 2021 by 3<br />
							highschool students from Slovakia.<br />
							Currently we are studying on high school SPŠE<br />
							Hálova 16, Bratislava. And we are part of really
							cool<br />
							study program named
							<a
								href="https://openlab.sk/"
								target="_blank"
								style="
									text-decoration: none;
									color: rgba(0, 0, 0, 0.4);
								"
							>
								<b>OpenLab</b> </a
							>.
						</h1>
					</div>
				</ion-row>

				<!-- about us bottom -->
				<ion-row class="Section" id="Projects">
					<ion-col>
						<img
							class="Space"
							src="@/assets/Space.svg"
							alt="Space"
							border="0"
						/>
					</ion-col>

					<ion-col>
						<h1 class="Section-Text"><b>ABOUT US</b></h1>
					</ion-col>
				</ion-row>

				<hr />

				<!-- Projects Section -->
				<!-- Projects -->
				<ion-row>
					<div id="projects" class="Section-Header Center">
						<h1>Projects</h1>
					</div>
				</ion-row>

				<!-- MemeTimeApp Header -->
				<ion-row>
					<div class="Center Inline MemeTime-Header">
						<h1 class="MemeTime-Font">M</h1>
						<h1 class="MemeTime-Text">emeTime</h1>
						<h1 class="MemeTime-Font">!</h1>
						<h1 class="MemeTime-Roboto">App</h1>
						<img
							class="MemeTime-Icon"
							src="@/assets/MemeTime!AppIcon.svg"
							alt=""
						/>
					</div>
				</ion-row>

				<!-- MemeTimeApp Mockup-->
				<ion-row>
					<img
						class="Meme-Time-Mockup Center"
						src="@/assets/Screens.svg"
						alt="Screens"
						border="0"
					/>
				</ion-row>

				<!-- memetime gradient text -->
				<ion-row>
					<div class="Meme-Time-Gradient Center">
						<a
							href="https://memetime.space-software.com/"
							target="_blank"
						>
							<h1>MemeTime!</h1>
						</a>
					</div>
				</ion-row>

				<!-- memetimeapp bottom text -->
				<ion-row>
					<div class="Bottom-Grid-MemeTime Center">
						<h1 class="Bottom-Text">
							MemeTime! is our first project and it’s a new<br />
							application for mobile devices.<br />
							MemeTime! points out that this is never<br />
							the bad time to improve your day.<br />
							The focus of our platform is simple and obvious<br />
							- just memes and other fun content without any<br />
							limits or censorship. Purpose of MemeTime! is to<br />
							make your day better with daily memes of your taste.
						</h1>
					</div>
				</ion-row>

				<!-- projects section bottom -->
				<ion-row>
					<ion-col>
						<img
							class="Space"
							src="@/assets/Space.svg"
							alt="Space"
							border="0"
						/>
					</ion-col>
					<ion-col>
						<h1 class="Section-Text"><b>PROJECTS</b></h1>
					</ion-col>
				</ion-row>

				<hr />

				<!-- Contantact Us Section-->

				<!-- contact us globe-->
				<ion-row id="Contact">
					<img
						class="Center Earth-Image"
						src="@/assets/Saly-44.svg"
						alt="Saly-44"
						border="0"
					/>
				</ion-row>

				<!-- contact text -->
				<ion-row>
					<div id="contact-us" class="Section-Header Center">
						<h1>Contact us</h1>
					</div>
				</ion-row>

				<!-- space email -->
				<ion-row>
					<div class="Center">
						<a
							href="mailto:business@space-software.com?subject=Mail%20from%20our%20Website&body=Dear%20Space%20Software%20Team%2C"
						>
							<h1 class="Space-Mail-Text">
								business@space-software.com
							</h1>
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
							class="Email-Icon Center"
							src="@/assets/ios-mail.svg"
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
							src="@/assets/Space.svg"
							alt="Space"
							border="0"
						/>
					</ion-col>
					<ion-col>
						<h1 class="Section-Text"><b>CONTACT</b></h1>
					</ion-col>
				</ion-row>

				<hr />
			</ion-grid>

			<!-- footer -->
			<ion-grid>
				<!-- social medias -->
				<ion-row class="Social-Medias">
					<a href="https://www.facebook.com" target="_blank">
						<img
							src="@/assets/facebook.svg"
							alt="Right"
							border="0"
						/>
					</a>

					<a
						href="https://www.instagram.com/spacesoftwarestudio/"
						target="_blank"
						><img
							src="@/assets/instagram.svg"
							alt="Right"
							border="0"
						/>
					</a>

					<a
						href="https://twitter.com/spacesoftstudio"
						target="_blank"
						><img
							src="@/assets/twitter.svg"
							alt="Right"
							border="0"
						/>
					</a>

					<a
						href="https://www.tiktok.com/@spacesoftware?lang=en"
						target="_blank"
					>
						<img src="@/assets/tiktok.svg" alt="Right" border="0" />
					</a>
				</ion-row>

				<!-- space row -->
				<ion-row>
					<h1 class="Center Space-Footer">space.</h1>
				</ion-row>

				<!-- all rights reserved -->
				<ion-row>
					<h1 class="Center All-Rights-Reserved">
						Ⓒ {{ new Date().getFullYear() }} All rights reserved
					</h1>
				</ion-row>
			</ion-grid>
		</ion-content>
	</ion-page>
</template>

<script setup lang="ts"></script>

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

hr {
	margin-top: -0.5vh;
	border: 1px solid rgba(187, 217, 255, 0.6);
	height: 0px;
	width: 90%;
	text-align: center;
}

@import url("https://fonts.googleapis.com/css2?family=Gothic+A1:wght@900&family=Manrope:wght@200;400;700;800&family=Roboto:ital,wght@0,700;1,700&family=Sarina&family=Space+Mono&display=swap");

.Space-Mail-Text {
	color: black;
	text-decoration: none;
	font-size: 19px;
	font-weight: 400px;
	font-family: "Space Mono", monospace;
}

.MemeTime-Header {
	margin-top: 10px;
}

.MemeTime-Icon {
	margin-top: -10px;
}

.MemeTime-Roboto {
	font-family: "Roboto";
	font-size: 24px;
	line-height: 22.64px;
	font-weight: 900;
}

.MemeTime-Text {
	font-family: "Roboto";
	font-size: 24px;
	line-height: 24.15px;
	font-weight: 700;
	color: #00b232;
}

.MemeTime-Font {
	font-family: "Sarina", cursive;
	color: #00b232;
	border: 0.5px #000000;
	margin-top: 16px;
}

.Inline {
	display: flex;
	flex-direction: row;
}

.Space-Footer {
	font-family: "Space Mono", monospace;
	font-weight: 800;
	font-size: 17px;
	margin-top: 1vh;
}

.All-Rights-Reserved {
	font-family: "Space Mono", monospace;
	font-size: 13px;
	font-weight: 400px;
	margin-top: 0vh;
}

.Background {
	background-image: linear-gradient(white, #cce2ff 200%);
	margin-top: 50px;
}

.Software-Text-Grid {
	margin-top: 30px;
}

.Software-Text {
	font-family: "Gothic A1";
	font-weight: 800;
	font-size: 31px;
	line-height: 46.65px;
	max-width: 300px;
}

.Gradient-Text {
	margin-top: -10px;
	background: -webkit-linear-gradient(340deg, #00d1ff 40%, #0209b5 85%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
	text-align: center;
	max-width: 500px;
}

.Technologies {
	display: flex;
	justify-content: space-around;
	width: 90vw;
	margin-top: 2vh;
	max-width: 450px;
}

.Team {
	margin-top: 50px;
}

.Earth-Image {
	margin-top: 40px;
}

.Section-Header {
	font-family: "Gothic A1";
	line-height: 30px;
	font-size: 24px;
	font-weight: 800;
	font-style: normal;
	color: #000000;
}

.Bottom-Grid {
	margin-top: -5px;
}

.Bottom-Grid-MemeTime {
	margin-top: -30px;
}

.Bottom-Text {
	font-family: "Roboto";
	font-size: 14px;
	font-weight: 400;
	line-height: 20.82px;
	color: rgba(0, 0, 0, 0.4);
	max-width: 350px;
}

.Space {
	margin-left: 9%;
	margin-top: 3vh;
}

.Section-Text {
	color: rgba(204, 226, 255, 1);
	margin-top: 2.4vh;
	text-align: right;
	margin-right: 9%;
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
	margin-top: -80px;
}

.Meme-Time-Gradient {
	font-family: "Gothic A1";
	font-size: 24px;
	background: -webkit-linear-gradient(360deg, #00b232 45%, #048383 85%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
	margin-top: -90px;
}

.Social-Medias {
	display: flex;
	justify-content: space-around;
	width: 90vw;
	margin-left: auto;
	margin-right: auto;
	margin-top: 1.5vh;
}

.Section {
	margin-top: 20px;
}
</style>
