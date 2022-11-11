interface img {
	id: number
	path: string
}

export interface project {
	gallery: img[]
	icon: img
	id: number
	title: string
	description: string
}
