import { Plugin } from 'ckeditor5/src/core'
import {
	addToolbarToDropdown,
	ButtonView,
	createDropdown,
} from 'ckeditor5/src/ui'

import shortcodesIcon from './../theme/icons/ckeditor.svg'
import TokensCommand from './tokens-command.js'

export default class Tokens extends Plugin {
	static get pluginName() {
		return 'Tokens'
	}

	constructor(editor) {
		super(editor)
		editor.config.define('shortcodes', window.shortcodes)
	}

	init() {
		const editor = this.editor
		const componentFactory = editor.ui.componentFactory
		const t = editor.t
		const options = editor.config.get('shortcodes')

		Object.keys(options).forEach(option => this._addButton(option))

		editor.ui.componentFactory.add('tokens', locale => {
			const dropdownView = createDropdown(locale)

			const buttons = Object.keys(options).map(option => componentFactory.create(`shortcode:${option}`))
			addToolbarToDropdown(dropdownView, buttons)

			dropdownView.buttonView.set({
				label: t('Shortcodes'),
				tooltip: true,
			})

			dropdownView.extendTemplate({
				attributes: {
					class: 'ck-shortcodes-dropdown',
				},
			})
			const defaultIcon = shortcodesIcon
			dropdownView.buttonView.bind('icon').toMany(buttons, 'isOn', (...areActive) => {
				const index = areActive.findIndex(value => value)

				if (index < 0) {
					return defaultIcon
				}

				// Return active button's icon.
				return buttons[index].icon
			})

			// Enable button if any of the buttons is enabled.
			dropdownView.bind('isEnabled').toMany(buttons, 'isEnabled', (...areEnabled) => areEnabled.some(isEnabled => isEnabled))

			return dropdownView
		})
	}


	_addButton(option) {
		const editor = this.editor
		const options = editor.config.get('shortcodes')

		editor.ui.componentFactory.add(`shortcode:${option}`, locale => {
			const command = new TokensCommand(editor)
			const buttonView = new ButtonView(locale)

			buttonView.set({
				label: options[option].label,
				icon: options[option].icon,
				tooltip: true,
			})

			// buttonView.bind('isEnabled').to(command)
			// buttonView.bind('isOn').to(command, 'value', value => value === option)
			//
			// // Execute command.
			// this.listenTo(buttonView, 'execute', () => {
			// 	editor.execute('alignment', { value: option })
			// 	editor.editing.view.focus()
			// })

			return buttonView
		})
	}
}
