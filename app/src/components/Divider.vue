<template>
	<div class="dividerLineWrapper">
		<h1 id="aboutus">About us</h1>
		<div class="dividerLine"></div>
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
	margin-right: 22.8vw;
	background-color: #bbd8ff93;
	width: 70vw;
	height: 3px;
}

.dividerLineWrapper {
	margin-top: 10vh;
	width: 100%;
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
		width: 100%;
		text-align: center;
	}
	.dividerLineWrapper {
		margin-left: 0;
	}
}
</style>
