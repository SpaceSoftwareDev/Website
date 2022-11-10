<template>
	<button>
		<div class="text">
			<slot />
		</div>
	</button>
</template>

<script lang="ts" setup></script>

<style lang="scss" scoped>
button {
	box-sizing: border-box;
	width: 180px;
	min-height: calc(40px + 1.5rem);
	border: none;
	outline: none;
	position: relative;
	z-index: 1;
	border-radius: 22px;
	border: 4px solid transparent;
	background: linear-gradient(white, white) padding-box,
		linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%) border-box;
	cursor: pointer;

	font-family: "Poppins", sans-serif;
	transition: all 0.2s ease-in-out;

	&:hover {
		background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%)
				padding-box,
			linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%)
				border-box;
		border-width: 0px;
	}
}

button:hover .text {
	color: white;
}

.text {
	display: flex;
	justify-content: center;
	align-items: center;
	background: linear-gradient(to bottom right, #00d1ff 17%, #0209b5 100%)
		padding-box;
	width: 100%;
	height: 100%;
	color: transparent;
	background-clip: text;
	-webkit-background-clip: text;
	font-size: 1.5rem;
}
</style>
