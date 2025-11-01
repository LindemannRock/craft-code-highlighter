<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * Lightweight syntax highlighting using Prism.js
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\services\Fields;
use craft\web\UrlManager;
use craft\web\twig\variables\CraftVariable;
use lindemannrock\codehighlighter\fields\CodeHighlighterField;
use lindemannrock\codehighlighter\models\Settings;
use lindemannrock\codehighlighter\services\PrismService;
use lindemannrock\codehighlighter\services\AssetService;
use lindemannrock\codehighlighter\twigextensions\CodeHighlighterTwigExtension;
use lindemannrock\codehighlighter\variables\CodeHighlighterVariable;
use yii\base\Event;

/**
 * Code Highlighter Plugin
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     1.0.0
 *
 * @property-read PrismService $prism
 * @property-read AssetService $assets
 * @property-read Settings $settings
 * @method Settings getSettings()
 */
class CodeHighlighter extends Plugin
{
    public static ?CodeHighlighter $plugin = null;
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;
    public bool $hasCpSection = false; // No CP section needed

    public static function config(): array
    {
        return [
            'components' => [
                'prism' => PrismService::class,
                'assets' => AssetService::class,
            ],
        ];
    }

    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        // Register Twig extension
        Craft::$app->view->registerTwigExtension(new CodeHighlighterTwigExtension());

        // Register Twig variable
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function(Event $event) {
                $variable = $event->sender;
                $variable->set('codeHighlighter', CodeHighlighterVariable::class);
            }
        );

        // Register field type
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = CodeHighlighterField::class;
            }
        );

        // Register CP routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function(RegisterUrlRulesEvent $event) {
                $event->rules['code-highlighter/settings'] = 'code-highlighter/settings/index';
            }
        );

        Craft::info('Code Highlighter plugin loaded', __METHOD__);
    }

    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }

    public function getSettingsResponse(): mixed
    {
        return Craft::$app->controller->redirect('code-highlighter/settings');
    }
}
