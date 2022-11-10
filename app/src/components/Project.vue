<template>
	<div class="project">
		<img :src="img" />
		<div class="projectInfo">
			<h1 v-html="title" />
			<p v-html="description" />
		</div>
	</div>
</template>
<script lang="ts" setup>
defineProps<{
	title: string
	description: string
	img: string
}>()
</script>
<style lang="scss" scoped>
.project {
	display: flex;
	width: 100vw;
	flex-direction: row;
	align-items: center;
	justify-content: center;
	padding: 6vh 12vh;
	&:nth-child(odd) {
		flex-direction: row-reverse;
	}
}
.projectInfo {
	display: flex;
	flex-direction: column;
	margin-left: 1vw;
}
img {
	width: 400px;
	height: auto;
	margin: 0;
	margin-right: 1rem;

	&:nth-child(odd) {
		margin: 0;
		margin-left: 1rem;
	}
}
p {
	margin: 0;
	color: rgba(0, 0, 0, 0.4);
	font-size: 1.1rem;
}

.icon {
	width: 100px;
	height: auto;
	margin-top: 4vh;
}

@media (max-width: 1160px) {
	.project {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

		&:nth-child(odd) {
			flex-direction: column;
		}
	}
	p {
		text-align: center;
	}

	img {
		margin: 0;
		margin-bottom: 1rem;

		&:nth-child(odd) {
			margin: 0;
			margin-bottom: 1rem;
		}
	}

	h1 {
		text-align: center;
	}
}
</style>
