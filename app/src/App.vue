<template>
	<RouterView></RouterView>
</template>

<script setup lang="ts">
import { RouterView } from "vue-router"
import { onMounted } from "vue"

onMounted(() => {
	window.prerenderReady = true
})
</script>
