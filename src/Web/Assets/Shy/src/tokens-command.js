import { Command } from 'ckeditor5/src/core'

export default class TokensCommand extends Command {
	refresh () {
		this.isEnabled = true
	}

	execute (options) {
		this.value = {
			option: options.shortcode,
		}

		this.editor.model.change(writer => {
			const insertPosition = editor.model.document.selection.getLastPosition()
			writer.insertText(`[shortcode name="${this.value.option}"]`, insertPosition)
		})
	}
}
