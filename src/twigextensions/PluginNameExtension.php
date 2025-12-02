<?php

namespace lindemannrock\codehighlighter\twigextensions;

use lindemannrock\codehighlighter\CodeHighlighter;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

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

class PluginNameHelper
{
    public function getDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getDisplayName();
    }
    public function getPluralDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getPluralDisplayName();
    }
    public function getFullName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getFullName();
    }
    public function getLowerDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getLowerDisplayName();
    }
    public function getPluralLowerDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getPluralLowerDisplayName();
    }
    public function __get(string $name): ?string
    {
        $method = 'get' . ucfirst($name);
        return method_exists($this, $method) ? $this->$method() : null;
    }
}
