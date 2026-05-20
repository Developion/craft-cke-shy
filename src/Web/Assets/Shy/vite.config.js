import { defineConfig } from 'vite'
import { resolve } from 'path'

export default defineConfig({
	build: {
		outDir: 'dist',
		emptyOutDir: true,
		lib: {
			entry: resolve(__dirname, 'src/tokens.js'),
			name: 'Tokens',

			fileName: () => 'tokens.js',
			formats: ['es'],
		},
		rollupOptions: {
			external: ['ckeditor5'],
		},
	},

	assetsInclude: ['**/*.svg'],
})
