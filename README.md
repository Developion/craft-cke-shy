# CKE Shy

.

## Requirements

This plugin requires Craft CMS 5.8.0 or later, and PHP 8.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “CKE Shy”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require developion/craft-cke-shy

# tell Craft to install the plugin
./craft plugin/install cke-shy
```

## Usage
In order to be able to use the `&shy;` tags provided by this plugin, a few things must be configured in your environment:
- HTMLPurifier config must be updated to contain with the following setting:
```json
"AutoFormat.RemoveEmpty.Predicate": {
	"span": {
		"class": "entity-shy"
	}
}
```
- CraftCMS CKEditor plugin config must be updated to contain the following setting:
```json
"htmlSupport": {
	"allow": [
		{
			"class": [
				"entity-shy"
			],
			"name": "span"
		}
	]
}
```

## Enjoy your hyphenation!