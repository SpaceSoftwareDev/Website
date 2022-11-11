<template>
	<div class="dividerLineWrapper">
		<h1><slot /></h1>
		<div class="dividerLine"></div>
	</div>
</template>
<script lang="ts" setup></script>
<style lang="scss" scoped>
h1 {
	font-family: "Poppins";
	color: #252525;
	font-weight: 800;
	margin: 0;
	width: 20%;
}

.dividerLine {
	background-color: #bbd8ff93;
	width: 90vw;
	height: 3px;
}

.dividerLineWrapper {
	margin-top: 10vh;
	width: 100%;
	padding-left: 8vw;
	padding-right: 8vw;
	display: flex;
	justify-content: space-between;
	align-items: center;

	&:nth-child(odd) {
		flex-direction: row-reverse;

		h1 {
			text-align: right;
		}
	}
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
		padding: 0;
	}
}
</style>
