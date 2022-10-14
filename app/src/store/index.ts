import { StorageValue } from "vvic-utils/types"

/**
 * Capacitor.js Storage implementation
 *
 * @see https://capacitorjs.com/docs/apis/storage
 */
export class Storage {
	readonly test = new StorageValue<string>("test")
}

export default new Storage()
