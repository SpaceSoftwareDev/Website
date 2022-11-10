<template>
	<ion-page>
		<NavBar />
		<ion-router-outlet></ion-router-outlet>
	</ion-page>
</template>

<script setup lang="ts">
import { NavBar } from "@/components"
</script>
