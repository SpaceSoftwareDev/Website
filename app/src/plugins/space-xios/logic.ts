import axios from "axios"
import type { AxiosStatic, AxiosResponse, AxiosRequestConfig } from "axios"
import toast, { ToastConfig } from "./toast"

export class SpaceXios {
	readonly blacklist: number[] = [401]

	readonly toast = toast

	/**
	 * Vanilla axios instance
	 * @see https://axios-http.com/
	 */
	readonly vanilla: AxiosStatic = axios

	/**
	 * Get Request With Custom Toast Notifications
	 * @param url - Url to send the request to
	 * @param options - Axios Request Options
	 * @param toast - Toast Config
	 */
	public async get<T = unknown, R = AxiosResponse<T, unknown>>(
		url: string,
		options?: AxiosRequestConfig,
		toast?: ToastConfig
	): Promise<R> {
		const response: R = await this.vanilla
			.get<T, R>(url, options)
			.then(async (response) => {
				if (toast) {
					this.toast.success(toast?.text || "")
				}
				return response
			})
			.catch((error) => {
				if (
					toast &&
					error &&
					!this.blacklist.includes(error.response.status)
				) {
					this.toast.error(toast.error || "")
				}
				return Promise.reject(error)
			})
		return response
	}

	/**
	 * Post Request With Custom Toast Notifications
	 *
	 * @param url - Url to send the request to
	 * @param data - Data to send with the request
	 * @param config - Axios request options
	 * @param toast - Toast Config
	 */
	public async post<T = unknown, R = AxiosResponse<T, unknown>, D = unknown>(
		url: string,
		data?: D,
		config?: AxiosRequestConfig<D>,
		toast?: ToastConfig
	): Promise<AxiosResponse> {
		const response: AxiosResponse = await this.vanilla
			.post(url, data, config)
			.then(async (response) => {
				if (toast) {
					this.toast.success(toast?.text || "")
				}
				return response
			})
			.catch((error) => {
				if (
					toast &&
					error &&
					!this.blacklist.includes(error.response.status)
				) {
					this.toast.error(toast?.error || "")
				}
				return Promise.reject(error)
			})
		return response
	}

	public async put<T = unknown, R = AxiosResponse<T, unknown>, D = unknown>(
		url: string,
		data?: D,
		config?: AxiosRequestConfig<D>
	): Promise<R> {
		return this.vanilla.put(url, data, config)
	}

	public async delete<
		T = unknown,
		R = AxiosResponse<T, unknown>,
		D = unknown
	>(url: string, config?: AxiosRequestConfig<D>): Promise<R> {
		return this.vanilla.delete(url, config)
	}

	public async request<
		T = unknown,
		R = AxiosResponse<T, unknown>,
		D = unknown
	>(config: AxiosRequestConfig<D>): Promise<R> {
		return this.vanilla.request(config)
	}
}

export { AxiosResponse, AxiosRequestConfig }

/**
 * Instance of the space-xios plugin
 */
export const instance = new SpaceXios()
export default instance
