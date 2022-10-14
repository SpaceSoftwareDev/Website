import { useToast } from "vue-toast-notification"

/**
 * Instance of Vue Toast Notifications
 */
export default useToast({
	position: "top",
	queue: true,
	duration: 1500
})

/**
 * Toast notification config/options
 * > **"Moj Toast s pastikov a tatarkov, obaleni vianockov, vyprazani vo vajicku"**
 * > - Jakub Krcmarik 2022
 */
export interface ToastConfig {
	text?: string
	error?: string
}
