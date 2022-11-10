<template>
	<div class="dividerLineWrapper">
		<div class="dividerLine"></div>
		<h1 id="projects">Projects</h1>
	</div>
</template>
<script lang="ts" setup></script>
<style lang="scss" scoped>
.container {
	display: flex;
	justify-content: space-between;
}

h1 {
	font-family: "Poppins";
	color: #252525;
	font-weight: 800;
	margin: 0;
	width: 12%;
}
.dividerLine {
	margin-right: 0;
	background-color: #bbd8ff93;
	width: 65vw;
	height: 3px;
}

.dividerLineWrapper {
	margin-top: 10vh;
	width: 77%;
	margin-left: 11vw;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

@media (max-width: 1160px) {
	.dividerLine {
		display: none;
	}
	h1 {
		width: 100vw;
		text-align: center;
	}
	.dividerLineWrapper {
		margin-left: 0;
		width: 100vw;
	}
}
</style>
