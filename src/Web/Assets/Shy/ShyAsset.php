<?php
declare(strict_types=1);

namespace Developion\CKEditorShy\Web\Assets\Shy;

use Craft;
use craft\ckeditor\web\assets\BaseCkeditorPackageAsset;
use craft\web\View;

/**
 * Shy asset bundle
 */
class ShyAsset extends BaseCkeditorPackageAsset
{
	public $sourcePath = __DIR__ . '/build';

	public $js = [
		'tokens.js',
	];

	public array $pluginNames = [
		'Tokens',
	];

	public array $toolbarItems = [
		'tokens',
	];

	public function registerPackage(View $view): void
	{
		$shyButton = json_encode([
			'label' => Craft::t('site', 'Soft Hyphen'),
			'handle' => 'soft-hyphen',
			'placeholder' => '🔹',
			//'placeholder' => '­',
			'value' => '\00ad',
			'icon' => @file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'soft-hyphen.svg'),
		]);

		$js = <<<JS
window.shyButton = {$shyButton};
JS;
		$view->registerJs($js, View::POS_HEAD);
		parent::registerPackage($view);
	}
}
