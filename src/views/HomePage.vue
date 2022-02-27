<template>
  <ion-page>
    <ion-content :fullscreen="true">

    <div class="background">
    <!-- header -->     
      <ion-grid>
        <ion-row>
          <ion-col>
              <img class="Logo" src="https://i.ibb.co/dkTnR4B/Logo-Nav-Bar-1.png" alt="Space-Logo" border="0">
          </ion-col>
          <ion-col>
            <br>
          </ion-col>
          <ion-col>
            <div class="Menu">
                <img src="https://i.ibb.co/gFMJwTn/More-Icon.png" alt="Hamburger-Menu" border="0">
            </div>
          </ion-col>
        </ion-row>
      </ion-grid>
      
      <!-- software studio text -->
        <ion-grid>
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
                    <ion-col class="CMS">
                        <img src="https://i.ibb.co/tx1gK9Z/October-CMS.png" alt="October-CMS" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col class="Vue">
                        <img src="https://i.ibb.co/yRqx2PY/Vue.png" alt="Vue" border="0"> 
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col class="AWS"> 
                        <img src="https://i.ibb.co/RvGsjKm/AWS.png" alt="AWS" border="0">
                    </ion-col>
                    <ion-col></ion-col>
                    <ion-col class="Ionic"> 
                        <img src="https://i.ibb.co/4TrzSsz/Ionic.png" alt="Ionic" border="0">
                    </ion-col>
                </div>
              </ion-row>

            <!-- team picture -->
            <ion-row>
                <img class="Team" src="https://i.ibb.co/PNwf3JX/Team.png" alt="Team" border="0">
            </ion-row>
            
            <!-- About us Text -->
            <ion-row>
              <div class="About-Us">
                <h3>About Us</h3>
              </div>
            </ion-row>

            <!-- Bottom Text -->
            <ion-row>
              <div class="Bottom-Text">
                <h2>We are new sofware studio founded by 3 highschool students from Slovakia.
                    Currently we are studying on high school SPŠE Hálova 16.
                    And we are part of really cool study plan named OPENLAB.
                </h2>
              </div>
            </ion-row>

      </ion-grid>
      </div>


      <div id="container">
      </div>
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
}
.Menu{
  position: absolute;
  margin-top: 4vh;
  right: 7vw;
  width: 31;
  height: 20;
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

.Vue{
  margin-left: 5vw;
}

.AWS{
 margin-left: 6vw;
}

.Ionic{
 margin-left: 7vw;
}

.About-Us{
  top: 0%;
  margin-left: 5vw;
  font-style: normal;
}

.Bottom-Text{
  margin-left: auto;
  margin-right: auto;
  text-indent: 20px;
  color: #000000 40%;
}

h1{
  font-size: 31px;
  font-family: 'Helvetica';
  font-weight: 800;
}

h2{
  text-align: left;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 14px;
 
}

h3{
  color: #2F2F2F;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 24px;
  font-weight: 800;
  line-height: 30px;
}

</style>