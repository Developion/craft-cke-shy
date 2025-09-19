<?php

namespace Developion\CKEditorShy;

use Craft;
use craft\ckeditor\Plugin as CKEditor;
use craft\base\Plugin as BasePlugin;
use craft\web\View;
use Developion\CKEditorShy\Web\Assets\Shy\ShyAsset;
use yii\base\Event;

class Plugin extends BasePlugin
{
	public function init(): void
	{
		parent::init();
		if (Craft::$app->getRequest()->getIsCpRequest()) {
			CKEditor::registerCkeditorPackage(ShyAsset::class);
		}

		if (Craft::$app->getRequest()->getIsSiteRequest()) {
			Event::on(
				View::class,
				View::EVENT_BEGIN_PAGE,
				static function (): void {
					Craft::$app->getView()->registerCss("span.entity-shy:before {content: '\ad'}");
				}
			);
		}
	}
}
