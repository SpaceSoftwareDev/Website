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
            <img class="Menu" src="https://i.ibb.co/FgdRKJv/More-Icon-1.png" alt="Hamburger-Menu" border="0">
          </ion-col>
        </ion-row>
      </ion-grid>
      
      <!-- software studio text -->
        <ion-grid class="background">
            <ion-row>
              <br>
            </ion-row>
              <div class="Text">
                  <h1>Software studio</h1>
                  <h1 class="Text2">founded by three</h1>
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
            
            <!-- About us Text -->
            <ion-row>
              <div class="About-Us">
                <h3>About Us</h3>
              </div>
            </ion-row>

            <!-- Bottom Text -->
            <ion-row>
              <div class="Bottom-Text" style="padding-left: 5vw;">
                <h2>We are new sofware studio founded by 3 highschool students from Slovakia.</h2>
                  <h2>Currently we are studying on high school SPŠE Hálova 16.</h2>
                   <h2>And we are part of really cool study plan named OPENLAB. </h2>
              </div>
            </ion-row>

            <!-- About Us Bottom -->
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
            <!-- Projects -->
            <ion-row>
              <h1 class="center">Projects</h1>
            </ion-row>

      <!-- <div id="container">
      </div> -->
      </ion-grid>
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
.background{
background-image: linear-gradient(white, #CCE2FF);
}
.Logo{
  margin-left: 1vw;
  margin-top: 3vh;
  width: 118.72px;
  height: 31.96px;
}
.Menu{
  width: 31px;
  height: 20px;
  margin-top: 3.9vh;
  margin-left: 14vw;
}
.Text{
  margin-top: 2vh;
  text-align: center;
}

.Text2{
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
}
.About-Us-Line{
    color: rgba(204, 226, 255, 1);
    margin-top: 0vh;
    text-align: right;
    padding-right: 2.5vw;
}

.center{
  text-align: center;
  margin-right: auto;
  margin-left: auto;
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
  font-family: Arial, Helvetica, sans-serif;
  font-size: 24px;
  font-weight: 800;
  line-height: 30px;
}

h4{
    font-size: 16px;
}

hr{
  /* margin-top: -2vh; */
  margin-top: -0.3vh;
  border: 1px solid rgba(187, 217, 255, 0.6);
  height: 0px;
  width:90%;
  text-align:center;
}


</style>