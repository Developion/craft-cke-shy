<?php
declare(strict_types=1);

namespace ContentReactor\web\assets\tokens;

use Craft;
use craft\ckeditor\web\assets\BaseCkeditorPackageAsset;
use craft\web\View;

class TokensAsset extends BaseCkeditorPackageAsset
{
	public $sourcePath = __DIR__ . '/build';

	public $js = [
		'tokens.js',
	];

	public array $pluginNames = [
		'Tokens',
		//'SoftHyphen',
		//'SpecialCharacters',
		//'SpecialCharactersEssentials',
	];

	public array $toolbarItems = [
		'tokens',
		//'softHyphen',
		//'specialCharacters',
	];

	public function registerPackage(View $view): void
	{
		$tokens = json_encode([
			[
				//'label' => Craft::t('site', 'Soft Hyphen'),
				'label' => '',
				'handle' => 'soft-hyphen',
				'placeholder' => '🔹',
				//'placeholder' => '­',
				'value' => '\00ad',
				'icon' => @file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'soft-hyphen.svg'),
			],
		]);

		$js = <<<JS
window.shortcodes = {$tokens};
JS;
		$view->registerJs($js, View::POS_HEAD);
		parent::registerPackage($view);
	}
}
