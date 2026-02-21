<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\twigextensions;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Plugin Name Twig Extension
 *
 * @since 5.1.0
 */
class PluginNameExtension extends AbstractExtension implements GlobalsInterface
{
    public function getName(): string
    {
        return 'Code Highlighter - Plugin Name Helper';
    }

    public function getGlobals(): array
    {
        return ['codeHelper' => new PluginNameHelper()];
    }
}
