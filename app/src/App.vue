<template>
	<ion-app>
		<!--Nav Bar-->
		<header>
			<NavBar />
		</header>
		<ion-router-outlet />
	</ion-app>
</template>

<script setup lang="ts">
import { IonApp, IonRouterOutlet } from "@ionic/vue"
import { onMounted } from "vue"
import NavBar from "@/components/NavBar.vue"

onMounted(() => {
	window.prerenderReady = true
})
</script>
