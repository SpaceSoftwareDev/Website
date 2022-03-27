<template>
  <ion-page>
    <ion-content :fullscreen="true">

    <!-- header -->
      <ion-grid>
        <ion-row>
          <ion-col>
              <img class="Logo" src="https://space-software.s3.eu-central-1.amazonaws.com/media/logo-nav-bar.png" alt="Space-Logo" border="0">
          </ion-col>
          <ion-col>
            <br>
          </ion-col>
          <ion-col>
            <img class="Hamburger-Menu" src="https://space-software.s3.eu-central-1.amazonaws.com/media/burger-menu.png" alt="Hamburger-Menu" border="0">
          </ion-col>
        </ion-row>
      </ion-grid>

      <!-- software studio text -->
        <ion-grid class="Background">
            <ion-row>
              <br>
            </ion-row>
              <div class="Software-Text">
                  <h1>Software studio</h1>
                  <h1 class="Founded-Text">founded by three</h1>
                  <h1 class="Gradient-Text">highschool students.</h1>
              </div>

            <!-- technologie logos   -->
            <ion-row>
                <div class="Technologies">
                    <ion-col>
                        <img id="OCMS" src="https://space-software.s3.eu-central-1.amazonaws.com/media/octobercms-2.png" alt="October-CMS" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col>
                        <img id="Vue" src="https://space-software.s3.eu-central-1.amazonaws.com/media/vue.png" alt="Vue" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col>
                        <img id="AWS" src="https://space-software.s3.eu-central-1.amazonaws.com/media/AWS.png" alt="AWS" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col>
                        <img id="Ionic" src="https://space-software.s3.eu-central-1.amazonaws.com/media/ionic-1.png" alt="Ionic" border="0">
                    </ion-col>
                </div>
              </ion-row>

            <!-- team picture -->
            <ion-row>
                <img class="Team" src="https://space-software.s3.eu-central-1.amazonaws.com/media/team.png" alt="Team" border="0">
            </ion-row>

            <!-- about us text -->
            <ion-row>
              <div class="About-Us">
                <h3>About Us</h3>
              </div>
            </ion-row>

            <!-- bottom text -->
            <ion-row>
              <div class="Bottom-Text" style="padding-left: 5vw;">
                <h2>We are new sofware studio founded by 3 highschool students from Slovakia.</h2>
                  <h2>Currently we are studying on high school SPŠE Hálova 16.</h2>
                   <h2>And we are part of really cool study plan named OPENLAB. </h2>
              </div>
            </ion-row>

            <!-- about us bottom -->
            <ion-row>
              <ion-col class="ioncol">
                <img class="Space" src="https://space-software.s3.eu-central-1.amazonaws.com/media/space.png" alt="Space" border="0">
              </ion-col>
              <ion-col></ion-col>
              <ion-col>
                <h5 class="Section-Text"><b>ABOUT US</b></h5>
              </ion-col>
            </ion-row>
            <hr>

          <!-- Projects Section -->
            <!-- projects -->
            <ion-row>
              <h1 class="Center" id="Projects">Projects</h1>
            </ion-row>

            <!-- memetimeApp header -->
            <ion-row>
              <h5 class="Meme-Time-Logo" id="M">M</h5>
              <h5 class="Meme-Time-Logo-Text">emeTime</h5>
              <h5 class="Meme-Time-Logo">!</h5>
              <h5 class="Meme-Time-Logo-2">App</h5>
              <img class="Meme-Time-App" src="https://space-software.s3.eu-central-1.amazonaws.com/media/memetime-app-icon.png" alt="Meme-Time-Logo" border="0">
            </ion-row>

            <!-- memetimeapp mockup-->
            <ion-row>
              <img class="Meme-Time-Mockup" src="https://space-software.s3.eu-central-1.amazonaws.com/media/memetimeapp-screens.png" alt="Screens" border="0">
            </ion-row>

            <!-- memetime gradient text -->
            <ion-row>
              <div class="Meme-Time-Gradient">
                <h3>MemeTime</h3>
              </div>
            </ion-row>

            <!-- memetimeapp bottom text -->
            <ion-row>
              <div id="MemTime-Text" class="Bottom-Text" style="padding-left: 5vw;">
                <h2>MemeTime is our first project its a new application for android devices.</h2>
                  <h2>Memetime points out that this is never the bad time to improve your day.
                    The focus of our platform is simple and obvious - just memes and other
                    fun content without any limits or censorship. Purpose of MemeTime!
                    is to make your day better with daily memes of your taste.</h2>
              </div>
            </ion-row>

          <!-- projects section bottom -->
          <ion-row>
            <ion-col>
              <img class="Space" src="https://space-software.s3.eu-central-1.amazonaws.com/media/space.png" alt="Space" border="0">
            </ion-col>
            <ion-col></ion-col>
            <ion-col>
              <h5 class="Section-Text"><b>PROJECTS</b></h5>
            </ion-col>
          </ion-row>
          <hr>

        <!-- Contantact Us Section-->
          <!-- contact us globe-->
          <ion-row>
            <img id="Globe-Img" class="Center" src="https://space-software.s3.eu-central-1.amazonaws.com/media/globe.png" alt="Saly-44" border="0">
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
             <a href="mailto:business@space-software.com?subject=Mail%20from%20our%20Website&body=Dear%20Space%20Software%20Team%2C">
               <h5 id="Space-Mail-Text">business@space-software.com</h5>
             </a>
           </div>
         </ion-row>

         <!-- email icon -->
         <ion-row>
           <a href="mailto:business@space-software.com?subject=Mail%20from%20our%20Website&body=Dear%20Space%20Software%20Team%2C" class="Center">
             <img class="Email-Icon center" src="https://space-software.s3.eu-central-1.amazonaws.com/media/mail-icon-3d.png" alt="mail-outline" border="0">
           </a>
         </ion-row>

          <!-- contact us bottom -->
          <ion-row>
            <ion-col>
              <img class="Space" src="https://space-software.s3.eu-central-1.amazonaws.com/media/space.png" alt="Space" border="0">
            </ion-col>
            <ion-col></ion-col>
            <ion-col>
              <h5 class="Section-Text"><b>CONTACT</b></h5>
            </ion-col>
          </ion-row>
          <hr>
        </ion-grid>

        <!-- footer -->
        <ion-grid class="Grid">
          <!-- space logo 3 -->
          <ion-row>
            <ion-col>
              <img class="Footer-Logo" src="https://space-software.s3.eu-central-1.amazonaws.com/media/Logo%20Space3.png" alt="Footer-Logo" border="0">
            </ion-col>
            <ion-col class="Footer-Text">
                 <h6>"Stop thinking about</h6>
                 <h6>what you cant do</h6> 
                 <h6>and focus on reality."</h6>
            </ion-col>
            <ion-col class="Social-Medias">
              <a href="https://www.facebook.com/space-Software-Studio-108894994970173"><img  id="Facebook" src="https://space-software.s3.eu-central-1.amazonaws.com/media/facebook.png" alt="Right" border="0"></a>
              <a href="https://www.instagram.com/spacesoftwarestudio/"><img id="Instagram" src="https://space-software.s3.eu-central-1.amazonaws.com/media/instagram.png" alt="Right" border="0"></a>
              <a href="https://twitter.com/spacesoftstudio"><img  id="Twitter" src="https://space-software.s3.eu-central-1.amazonaws.com/media/twitter.png" alt="Right" border="0"></a>
              <a href="https://www.tiktok.com/@spacesoftware?lang=en"><img  id="Tik-Tok" src="https://space-software.s3.eu-central-1.amazonaws.com/media/tiktok.png" alt="Right" border="0"></a>
            </ion-col>
          </ion-row>

        </ion-grid>

    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { IonContent, IonPage, IonGrid, IonRow, IonCol, } from '@ionic/vue';
</script>

<style lang="scss" scoped>

#OCMS{
  width: 18px;
  height: 20.78px;
  size: 50%;
  margin-right: 7vw;
}

#Vue{
  width: 25.89px;
  height: 20.78px;
  margin-left: 1vw;
}

#AWS{
  width: 37.78px;
  height: 21.78px;
  margin-left: 7vw;
}

#Ionic{
  width: 22.43px;
  height: 24px;
  margin-left: 7vw;
}

#Text{
  margin-top: 1vh;
}

#Projects{
  font-weight: 100px;
  font-size: 24px;
}

#MemTime-Text{
  margin-top: -6vh;
}

#M{
    margin-left: auto;
}

#Globe-Img{
  width: 202px;
  height: 171.22px;
  margin-top: 5vh;
}

#Contact-Text{
  font-weight: 400px;
}

#Space-Mail{
  margin-top: -2vh;
}

#Space-Mail-Text{
  color: black;
  text-decoration: none;
  font-size: 19px;
  font-weight: 400px;
}

#Facebook{
  // width: 11.82px;
  // height: 11.8px;
  width: 18px;
  height: 17px;
  margin-left: -10vw;
}

#Instagram{
  // width: 11.82px;
  // height: 11.8px;
  width: 18px;
  height: 17px;
  margin-left: 4vw;
}

#Twitter{
  // width: 14.38px;
  // height: 11.8px;
  width: 18px;
  height: 17px;
  margin-left: 4vw;
}

#Tik-Tok{
  // width: 10.02px;
  // height: 11.8;
  width: 18px;
  height: 17px;
  margin-left: 4vw;
}

@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Sarina&display=swap");

.Background{
background-image: linear-gradient(white, #CCE2FF 160%);
}

.Logo{
  width: 104px;
  height: 36px;
  margin-left: 6vw;
  margin-top: 2.5vh;
}

.Hamburger-Menu{
  width: 31px;
  height: 20px;
  margin-top: 3.9vh;
  margin-left: 14vw;
}

.Software-Text{
  margin-top: 2vh;
  text-align: center;
}

.Founded-Text{
  margin-top: 0vh;
}
.Gradient-Text{
  margin-top: 0vh;
  background: -webkit-linear-gradient(360deg, #00D1FF 40%, #0209B5 85%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.Technologies{
  margin-left: auto;
  margin-right: auto;
  margin-top: 2vh;
}
.Team{
  margin-left: auto;
  margin-right: auto;
  margin-top: 5vh;
  width: 339px;
  height: 228px;
}

.About-Us{
  top: 0%;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  font-style: normal;
}

.Bottom-Text{
  margin-top: 2vh;
  margin-right: auto;
  color: rgba(0, 0, 0, 0.4);
  padding-right: 10vw;
}

.Space{
  width: 27px;
  height: 11.39px;
  margin-left: 4vw;
  margin-top: 3vh;
}
.Section-Text{
    color: rgba(204, 226, 255, 1);
    margin-top: 2.4vh;
    text-align: right;
    padding-right: 2.5vw;
    font-size: 16px;
}

.Center{
  text-align: center;
  margin-right: auto;
  margin-left: auto;
}

.Meme-Time-Logo{
  color: #00B232;
  font-family: "Sarina", cursive;
  font-style: normal;
	font-weight: 400;
  font-size: 24px;
  text-shadow: 0 0 1px black, 0 0 1px black;
  margin-top: 3vh;
}

.Meme-Time-Logo-Text{
  margin-left: 0px;
  color: #00B232;
  font-family: "Roboto";
  font-style: normal;
	font-weight: 800;
  text-shadow: 0 0 1px black, 0 0 1px black;
  font-size: 24px;
  margin-top: 3vh;
}

.Meme-Time-Logo-2{
  margin-left: 0vw;
  font-family: "Roboto";
  font-weight: 800;
  font-size: 24px;
  margin-top: 3vh;
}

.Meme-Time-App{
  text-align: right;
  margin-right: 8vw;
  margin-left: 2vw;
  margin-bottom: 5vw;
  width: 78.13px;
  height: 78.14px;
  text-shadow: 4px 4px 7px rgba(0, 0, 0, 0.25);
}

.Meme-Time-Mockup{
  margin-right: auto;
  margin-left: auto;
  margin-top: -15vh;
  width: 380px;
  height: 482px;
}

.Meme-Time-Gradient{
  background: -webkit-linear-gradient(420deg, #00B232 45%, #048383 85%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-top: -15vh;
  margin-left: 5vw;
  font-style: normal;
}

.Email-Icon{
  width: 100px;
  height: 100px;
  margin-left: auto;
  margin-right: auto;
}

.Grid{
  height: 94px;
}

.Footer-Logo{
  width: 90px;
  height: 40px;
  text-align: left;
  margin-top: 2.2vh;
  margin-left: 9px;
  margin-bottom: auto;
}

.Footer-Text{
  text-align: center;
  margin-top: 2vh;
  margin-right: 3.3vw;
}

.Social-Medias{
  text-align: right;
  margin-top: 3.4vh;
}

h1{
  font-size: 31px;
  font-family: 'Helvetica';
  font-weight: 800;
}

h2{
  font-family: "Roboto";
  font-size: 14px;
  font-weight: 500;
  margin-top: -1vh;
  text-align: left;
}

h3{
  color: #2F2F2F;
  font-family: Arial, Helvetica;
  font-size: 24px;
  font-weight: 800;
  line-height: 30px;
}

h6{
  font-family: "Helvetica";
  font-weight: 800;
  font-size: 10px;
  margin: 0.2vh;
}

hr{
  /* margin-top: -2vh; */
  margin-top: -0.5vh;
  border: 1px solid rgba(187, 217, 255, 0.6);
  height: 0px;
  width:90%;
  text-align:center;
}

</style>