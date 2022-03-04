<template>
  <ion-page>
    <ion-content :fullscreen="true">

    <!-- header -->     
      <ion-grid>
        <ion-row>
          <ion-col>
              <img class="Logo" src="https://i.ibb.co/441BZRX/Logo-Nav-Bar-2.png" alt="Space-Logo" border="0">
          </ion-col>
          <ion-col>
            <br>
          </ion-col>
          <ion-col>
            <img class="Hamburger-Menu" src="https://i.ibb.co/FgdRKJv/More-Icon-1.png" alt="Hamburger-Menu" border="0">
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
                        <img class="OCMS" src="https://i.ibb.co/Gk9PCDD/October-CMS-1.png" alt="October-CMS" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col>
                        <img class="Vue" src="https://i.ibb.co/bvWB5FX/Vue-1.png" alt="Vue" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col class="AWSCol"> 
                        <img class="AWS" src="https://i.ibb.co/kQ1rvfs/AWS-1.png" alt="AWS" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col> 
                        <img class="Ionic" src="https://i.ibb.co/rp0NV4F/Ionic-1.png" alt="Ionic" border="0">
                    </ion-col>
                </div>
              </ion-row>

            <!-- team picture -->
            <ion-row>
                <img class="Team" src="https://i.ibb.co/CKWtjx1/Team.png" alt="Team" border="0">
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
                <img class="Space" src="https://i.ibb.co/Y3GdV7d/Space.png" alt="Space" border="0">
              </ion-col>
              <ion-col></ion-col>
              <ion-col>
                <h4 class="About-Us-Line"><b>ABOUT US</b></h4>
              </ion-col>
            </ion-row>    
            <hr>

          <!-- Projects Section -->
            <!-- projects -->
            <ion-row>
              <h1 class="center" id="Projects">Projects</h1>
            </ion-row>

            <!-- memetimeApp header -->
            <ion-row>
              <img class="Meme-Time-App" src="https://i.ibb.co/Nt3Z3t9/Meme-Time-Section.png" alt="Meme-Time-Section" border="0">
            </ion-row>

            <!-- memetimeapp mockup-->
            <ion-row>
              <img class="Meme-Time-Mockup" src="https://i.ibb.co/3vDKTht/Screens.png" alt="Screens" border="0">
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
            <ion-col class="ioncol">
              <img class="Space" src="https://i.ibb.co/Y3GdV7d/Space.png" alt="Space" border="0">
            </ion-col>
            <ion-col></ion-col>
            <ion-col>
              <h4 class="About-Us-Line"><b>PROJECTS</b></h4>
            </ion-col>
          </ion-row>    
          <hr>

        <!-- Contantact Us Section-->
          <!-- contact us globe-->
          <ion-row>
            <img id="Globe-Img" class="center" src="https://i.ibb.co/0Jj6BYF/Saly-44.png" alt="Saly-44" border="0">
          </ion-row>

          <!-- contact text -->
          <ion-row>
            <div id="Contact-Text" class="center">
               <h3>Contact</h3>
            </div>
          </ion-row>

         <!-- space email -->
         <ion-row>
           <div id="Space-Mail" class="center">
             <h5>business@space-software.com</h5>
           </div>
         </ion-row>

         <!-- email icon -->
         <ion-row>
           <img class="Email-Icon" src="https://i.ibb.co/V2Mn4jg/mail-outline.png" alt="mail-outline" border="0">
         </ion-row>

          <!-- contact us bottom -->
          <ion-row>
            <ion-col class="ioncol">
              <img class="Space" src="https://i.ibb.co/Y3GdV7d/Space.png" alt="Space" border="0">
            </ion-col>
            <ion-col></ion-col>
            <ion-col>
              <h4 class="About-Us-Line"><b>CONTACT</b></h4>
            </ion-col>
          </ion-row>    
          <hr>
        </ion-grid>

        <!-- Footer -->
        <ion-grid class="grid">

        </ion-grid>

      <!-- <div id="container">
      </div> -->
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage, IonGrid, IonRow, IonCol, } from '@ionic/vue';
import { defineComponent } from 'vue';

export default defineComponent({
  components: {
    IonContent,
    IonPage,
    IonGrid,
    IonRow,
    IonCol
  }
})
</script>

<style scoped>

#Text{
  margin-top: 1vh;
}

#container {
  text-align: center;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}

#container strong {
  font-size: 20px;
  line-height: 26px;
}

#container p {
  font-size: 16px;
  line-height: 22px; 
  color: #fffbfb;
  color: #8c8c8c;
  margin: 0;
}

#container a {
  text-decoration: none;
}

#Projects{
  font-weight: 100px;
  font-size: 24px;
}

#MemTime-Text{
  margin-top: -6vh;
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

.Background{
background-image: linear-gradient(white, #CCE2FF 160%);
}

.Logo{
  margin-left: 1vw;
  margin-top: 3vh;
  width: 118.72px;
  height: 31.96px;
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

.OCMS{
  width: 20.33px;
  height: 20.78px;
  size: 50%;
}

.Vue{
  width: 25.89px;
  height: 20.78px;
  margin-left: 5vw;
}

.AWS{
  width: 37.78px;
  height: 20.78px;
  margin-left: 6vw;
}

.Ionic{
  width: 22.43px;
  height: 24px;
  margin-left: 7vw;
}

.About-Us{
  top: 0%;
  margin-left: 5vw;
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
.About-Us-Line{
    color: rgba(204, 226, 255, 1);
    margin-top: 2.4vh;
    text-align: right;
    padding-right: 2.5vw;
}

.center{
  text-align: center;
  margin-right: auto;
  margin-left: auto;
}

.Meme-Time-App{
  margin-left: auto;
  margin-right: auto;
  width: 380px;
  height: 139px;
}

.Meme-Time-Mockup{
  margin-right: auto;
  margin-left: auto;
  margin-top: -18vh;
  width: 380px;
  height: 482px;
}

.Meme-Time-Gradient{
  background: -webkit-linear-gradient(200deg, #00B232 100%, #048383 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-top: -15vh;
  margin-left: 5vw;
  font-style: normal;
}

.Email-Icon{
  width: 41px;
  height: 41px;
  margin-left: auto;
  margin-right: auto;
}

.grid{
  height: 94px;
}

h1{
  font-size: 31px;
  font-family: 'Helvetica';
  font-weight: 800;
}

h2{
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 14px;
  font-weight: 400;
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

h4{
    font-size: 16px;
}

h5{
  font-size: 19px;
  font-weight: 400px;
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