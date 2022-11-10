<template>
	<div class="project">
		<img src="/assets/illustration.png" />
		<div class="projectInfo">
			<h1>MemeTime!</h1>
			<p>
				memetime is veri good app i really like it is godlike i dont
				know what am typing but is veri goot i really memetime is veri
				good app i really like it is godlike i dont know what am typing
				but is veri goot i really memetime is veri good app i really
				like it is godlike i dont know what am typing but is veri goot i
				really
			</p>
		</div>
		<img src="/assets/klinec.png" class="icon" />
	</div>
</template>
<script lang="ts"></script>
<style lang="scss" scoped>
.project {
	padding-right: 14vw;
	display: flex;
	margin-left: 12vw;
}
.projectInfo {
	margin-left: 1vw;
}
img {
	width: 400px;
	height: auto;
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
	}
	p {
		text-align: center;
	}

	h1 {
		text-align: center;
	}
	img {
	}
	.icon {
	}
}
</style>
