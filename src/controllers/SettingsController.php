<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\controllers;

use craft\web\Controller;
use lindemannrock\codehighlighter\CodeHighlighter;
use yii\web\Response;

/**
 * Settings Controller
 */
class SettingsController extends Controller
{
    public function actionIndex(): Response
    {
        return $this->actionGeneral();
    }

    public function actionGeneral(): Response
    {
        $settings = CodeHighlighter::$plugin->getSettings();

        return $this->renderTemplate('code-highlighter/settings/general', [
            'settings' => $settings,
        ]);
    }
}
