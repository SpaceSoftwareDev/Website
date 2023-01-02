/* eslint-env node */

module.exports = {
	root: true,
	extends: [
		"plugin:vue/vue3-essential",
		"eslint:recommended",
		"@vue/eslint-config-typescript/recommended",
		"@vue/eslint-config-prettier"
	],
	env: {
		"vue/setup-compiler-macros": true,
		browser: true,
		node: false,
		es6: true,
		commonjs: false
	},
	rules: {
		"vue/multi-word-component-names": "off",
		"@typescript-eslint/no-unused-vars": "off"
	}
}
