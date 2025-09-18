// SoftHyphen.js
import { Plugin } from 'ckeditor5/src/core';

export default class SoftHyphen extends Plugin {
	static get pluginName() { return 'SoftHyphen'; }

	afterInit() {
		const editor = this.editor;

		// Use the already-loaded SpecialCharacters (if present).
		if ( !editor.plugins.has('SpecialCharacters') ) {
			console.warn('[CKE5] SpecialCharacters not present; skipping &shy; registration.');
			return;
		}

		const specialChars = editor.plugins.get('SpecialCharacters');

		// Add to (or create) the "Entities" category.
		// SpecialCharacters inserts the exact "character" string.
		specialChars.addItems('Entities', [
			{ title: editor.t('Soft hyphen (&shy;)'), character: '&shy;' }
		]);
	}
}
