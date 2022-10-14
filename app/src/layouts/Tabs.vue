<template>
	<ion-page>
		<ion-tabs>
			<Header />
			<ion-router-outlet></ion-router-outlet>
			<ion-tab-bar>
				<ion-tab-button tab="feed" href="/feed">
					<ion-icon :icon="icons.newspaper" />
					<ion-label>{{ t("tabs.feed") }}</ion-label>
				</ion-tab-button>

				<ion-tab-button tab="browse" href="/browse">
					<ion-icon :icon="icons.compass" />
					<ion-label>{{ t("tabs.browse") }}</ion-label>
				</ion-tab-button>

				<ion-tab-button tab="me" href="/profile">
					<ion-icon :icon="icons.personCircleOutline" />
					<ion-label>{{ t("tabs.profile") }}</ion-label>
				</ion-tab-button>
			</ion-tab-bar>
		</ion-tabs>
	</ion-page>
</template>

<script setup lang="ts">
import { Header } from "@/components"
import * as icons from "ionicons/icons"
import { useI18n } from "vue-i18n"
const { t } = useI18n()
</script>

<style scoped lang="scss">
ion-tab-bar,
ion-tab-button {
	background-color: white;
}

body.dark {
	ion-tab-bar,
	ion-tab-button {
		background-color: #202225;
	}
}
</style>
