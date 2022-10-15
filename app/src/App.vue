<template>
	<ion-app>
		<ion-router-outlet />
	</ion-app>
</template>

<script setup lang="ts">
import { IonApp, IonRouterOutlet } from "@ionic/vue"
import { onMounted } from "vue"

onMounted(() => {
	window.prerenderReady = true
})
</script>
