import axios from "axios"

interface resource {
	id: number
}

export interface CMSData<T> {
	data: T
}

interface img extends resource {
	path: string
}

export interface project extends resource {
	gallery: img[]
	icon: img
	title: string
	description: string
}

export interface TeamMember extends resource {
	avatar: img
	name: string
	link: string
	stack: string[]
}

export function Get<T>(url: string) {
	return axios.get<CMSData<T>>(url)
}
