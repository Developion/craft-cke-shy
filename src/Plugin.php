<?php

namespace Developion\CKEditorShy;

use Craft;
use craft\ckeditor\Plugin as CKEditor;
use Developion\CKEditorShy\Models\Settings;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use Developion\CKEditorShy\Web\Assets\Shy\ShyAsset;

/**
 * CKE Shy plugin
 *
 * @method static Plugin getInstance()
 * @method Settings getSettings()
 * @author Developion <admin@developion.com>
 * @copyright Developion
 * @license MIT
 */
class Plugin extends BasePlugin
{
	public string $schemaVersion = '1.0.0';
	public bool $hasCpSettings = true;

	public static function config(): array
	{
		return [
			'components' => [
				// Define component configs here...
			],
		];
	}

	public function init(): void
	{
		parent::init();

		$this->attachEventHandlers();
		CKEditor::registerCkeditorPackage(ShyAsset::class);

		// Any code that creates an element query or loads Twig should be deferred until
		// after Craft is fully initialized, to avoid conflicts with other plugins/modules
		Craft::$app->onInit(function () {
			// ...
		});
	}

	private function attachEventHandlers(): void
	{
		// Register event handlers here ...
		// (see https://craftcms.com/docs/5.x/extend/events.html to get started)
	}

	protected function createSettingsModel(): ?Model
	{
		return Craft::createObject(Settings::class);
	}

	protected function settingsHtml(): ?string
	{
		return Craft::$app->view->renderTemplate('cke-shy/_settings.twig', [
			'plugin' => $this,
			'settings' => $this->getSettings(),
		]);
	}
}
