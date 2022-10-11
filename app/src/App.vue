<template>
	<ion-app>
		<Navbar />
		<ion-router-outlet />
	</ion-app>
</template>

<script setup lang="ts">
import { IonApp, IonRouterOutlet } from "@ionic/vue"
import Navbar from "./components/navbar.vue"
</script>
