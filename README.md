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

# !!!
In order to avoid soft hyphens being purged by CraftCMS StringHelper regex for invisible characters, run the following command:
```
php craft cke-shy/fix-string-helper
```
or if you're using it locally, run:
```
ddev craft cke-shy/fix-string-helper
```
