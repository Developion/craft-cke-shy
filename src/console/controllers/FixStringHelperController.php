<?php

namespace Developion\CKEditorShy\console\controllers;

use Craft;
use craft\console\Controller;
use yii\console\ExitCode;

class FixStringHelperController extends Controller
{
	public $defaultAction = 'index';

	public function actionIndex(): int
	{
		$stringHelperFilePath = Craft::getAlias('@craftcms/src/helpers/StringHelper.php');
		$stringHelperFile = @file_get_contents($stringHelperFilePath);
		$stringHelperFile = preg_replace('/^(\s*)(\'00ad\')/m', '$1//$2', $stringHelperFile);
		file_put_contents($stringHelperFilePath, $stringHelperFile);

		return ExitCode::OK;
	}
}
