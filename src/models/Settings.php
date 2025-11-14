<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\models;

use Craft;
use craft\base\Model;

/**
 * Code Highlighter Settings Model
 */
class Settings extends Model
{
    // General
    public string $pluginName = 'Code Highlighter';

    // Theme
    public string $defaultTheme = 'tomorrow';

    // Language (default for new fields)
    public string $defaultLanguage = 'php';

    // Available Languages (which languages to show in dropdowns)
    public array $availableLanguages = [
        'markup', 'css', 'clike', 'javascript',
        'php', 'bash', 'twig', 'yaml', 'json'
    ];

    // Editor Font Size (default for new fields)
    public int $defaultFontSize = 14; // pixels

    // Frontend Typography (optional - leave empty to use theme defaults)
    public string $fontFamily = ''; // e.g., 'JetBrains Mono, monospace'

    // Frontend Features
    public bool $enableCopyButton = true;
    public array $copyButtonStyles = [];

    /**
     * Backward compatibility setter
     */
    public function __set($name, $value)
    {
        // Backward compatibility: enableLineNumbers (removed)
        if ($name === 'enableLineNumbers') {
            return;
        }

        // Backward compatibility: autoFormat (removed)
        if ($name === 'autoFormat') {
            return;
        }

        parent::__set($name, $value);
    }

    /**
     * Before validation - normalize data
     */
    public function beforeValidate(): bool
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        Craft::info('Settings beforeValidate - availableLanguages: ' . json_encode($this->availableLanguages), 'code-highlighter');

        // Handle Craft's "Select All" value for availableLanguages
        if (is_array($this->availableLanguages) && in_array('*', $this->availableLanguages)) {
            Craft::info('Found * in availableLanguages, expanding to all languages', 'code-highlighter');
            // Replace '*' with all available languages
            $this->availableLanguages = array_keys($this->getAllPrismLanguages());
            Craft::info('Expanded to: ' . json_encode($this->availableLanguages), 'code-highlighter');
        }

        return true;
    }

    protected function defineRules(): array
    {
        return [
            [['pluginName'], 'required'],
            [['pluginName', 'defaultLanguage', 'fontFamily'], 'string', 'max' => 255],
            [['defaultTheme'], 'in', 'range' => array_keys($this->getAvailableThemes())],
            [['defaultLanguage'], 'in', 'range' => array_keys($this->getAllPrismLanguages())],
            [['enableCopyButton'], 'boolean'],
            [['availableLanguages'], 'safe'],
            [['availableLanguages'], 'validateAvailableLanguages'],
            [['defaultFontSize'], 'integer', 'min' => 8, 'max' => 32],
            [['defaultFontSize'], 'default', 'value' => 14],
            [['fontFamily'], 'default', 'value' => ''],
        ];
    }

    /**
     * Validate that default language is in available languages
     */
    public function validateAvailableLanguages($attribute, $params): void
    {
        // Ensure availableLanguages is an array
        if (!is_array($this->availableLanguages)) {
            $this->availableLanguages = [];
        }

        // If empty, use defaults
        if (empty($this->availableLanguages)) {
            return; // Empty is valid (all languages available)
        }

        // Ensure default language is included
        if (!in_array($this->defaultLanguage, $this->availableLanguages)) {
            $this->availableLanguages[] = $this->defaultLanguage;
        }

        // Remove duplicates
        $this->availableLanguages = array_unique($this->availableLanguages);
    }

    /**
     * Check if a setting is overridden in config file
     *
     * @param string $setting
     * @return bool
     */
    public function isOverriddenByConfig(string $setting): bool
    {
        $configFileSettings = Craft::$app->getConfig()->getConfigFromFile('code-highlighter');
        return isset($configFileSettings[$setting]);
    }

    /**
     * Available Prism themes
     */
    public function getAvailableThemes(): array
    {
        return [
            // Core Prism Themes
            'default' => 'Default',
            'dark' => 'Dark',
            'funky' => 'Funky',
            'okaidia' => 'Okaidia',
            'twilight' => 'Twilight',
            'coy' => 'Coy',
            'solarizedlight' => 'Solarized Light',
            'tomorrow' => 'Tomorrow Night',

            // Popular Extended Themes
            'atom-dark' => 'Atom Dark',
            'dracula' => 'Dracula',
            'material-dark' => 'Material Dark',
            'material-light' => 'Material Light',
            'material-oceanic' => 'Material Oceanic',
            'nord' => 'Nord',
            'one-dark' => 'One Dark',
            'one-light' => 'One Light',
            'synthwave84' => 'Synthwave 84',
            'vsc-dark-plus' => 'VS Code Dark+',
            'vs' => 'Visual Studio',
            'night-owl' => 'Night Owl',
            'gruvbox-dark' => 'Gruvbox Dark',
            'gruvbox-light' => 'Gruvbox Light',
            'coldark-cold' => 'Coldark Cold',
            'coldark-dark' => 'Coldark Dark',
        ];
    }

    /**
     * Get all Prism.js supported languages
     * Full list from Prism.js documentation
     */
    public function getAllPrismLanguages(): array
    {
        return [
            'markup' => 'HTML/XML/Markup',
            'css' => 'CSS',
            'clike' => 'C-like',
            'javascript' => 'JavaScript',
            'abap' => 'ABAP',
            'actionscript' => 'ActionScript',
            'ada' => 'Ada',
            'apacheconf' => 'Apache Configuration',
            'apl' => 'APL',
            'applescript' => 'AppleScript',
            'arduino' => 'Arduino',
            'asciidoc' => 'AsciiDoc',
            'aspnet' => 'ASP.NET (C#)',
            'autohotkey' => 'AutoHotkey',
            'autoit' => 'AutoIt',
            'bash' => 'Bash/Shell',
            'basic' => 'BASIC',
            'batch' => 'Batch',
            'c' => 'C',
            'csharp' => 'C#',
            'cpp' => 'C++',
            'coffeescript' => 'CoffeeScript',
            'clojure' => 'Clojure',
            'crystal' => 'Crystal',
            'd' => 'D',
            'dart' => 'Dart',
            'diff' => 'Diff',
            'django' => 'Django/Jinja2',
            'docker' => 'Docker',
            'elixir' => 'Elixir',
            'elm' => 'Elm',
            'erb' => 'ERB',
            'erlang' => 'Erlang',
            'fsharp' => 'F#',
            'flow' => 'Flow',
            'fortran' => 'Fortran',
            'gherkin' => 'Gherkin',
            'git' => 'Git',
            'go' => 'Go',
            'graphql' => 'GraphQL',
            'groovy' => 'Groovy',
            'haml' => 'Haml',
            'handlebars' => 'Handlebars',
            'haskell' => 'Haskell',
            'haxe' => 'Haxe',
            'http' => 'HTTP',
            'java' => 'Java',
            'javadoc' => 'JavaDoc',
            'jsdoc' => 'JSDoc',
            'json' => 'JSON',
            'jsonp' => 'JSONP',
            'json5' => 'JSON5',
            'julia' => 'Julia',
            'kotlin' => 'Kotlin',
            'latex' => 'LaTeX',
            'less' => 'Less',
            'liquid' => 'Liquid',
            'lisp' => 'Lisp',
            'lua' => 'Lua',
            'makefile' => 'Makefile',
            'markdown' => 'Markdown',
            'matlab' => 'MATLAB',
            'nginx' => 'nginx',
            'nim' => 'Nim',
            'nix' => 'Nix',
            'objectivec' => 'Objective-C',
            'ocaml' => 'OCaml',
            'pascal' => 'Pascal',
            'perl' => 'Perl',
            'php' => 'PHP',
            'phpdoc' => 'PHPDoc',
            'plsql' => 'PL/SQL',
            'powershell' => 'PowerShell',
            'prolog' => 'Prolog',
            'properties' => '.properties',
            'protobuf' => 'Protocol Buffers',
            'pug' => 'Pug',
            'puppet' => 'Puppet',
            'python' => 'Python',
            'r' => 'R',
            'jsx' => 'React JSX',
            'tsx' => 'React TSX',
            'reason' => 'Reason',
            'regex' => 'Regex',
            'rest' => 'reST',
            'ruby' => 'Ruby',
            'rust' => 'Rust',
            'sass' => 'Sass (Sass)',
            'scss' => 'Sass (Scss)',
            'scala' => 'Scala',
            'scheme' => 'Scheme',
            'smalltalk' => 'Smalltalk',
            'smarty' => 'Smarty',
            'sql' => 'SQL',
            'stylus' => 'Stylus',
            'swift' => 'Swift',
            'tcl' => 'Tcl',
            'textile' => 'Textile',
            'toml' => 'TOML',
            'twig' => 'Twig',
            'typescript' => 'TypeScript',
            'vbnet' => 'VB.Net',
            'velocity' => 'Velocity',
            'verilog' => 'Verilog',
            'vhdl' => 'VHDL',
            'vim' => 'vim',
            'wasm' => 'WebAssembly',
            'wiki' => 'Wiki markup',
            'xquery' => 'XQuery',
            'yaml' => 'YAML',
        ];
    }

    /**
     * Get filtered list of languages based on availableLanguages setting
     *
     * @return array
     */
    public function getFilteredLanguages(): array
    {
        $all = $this->getAllPrismLanguages();

        // If no filter set, return all
        if (empty($this->availableLanguages)) {
            return $all;
        }

        // Filter to only available languages
        $filtered = [];
        foreach ($this->availableLanguages as $key) {
            if (isset($all[$key])) {
                $filtered[$key] = $all[$key];
            }
        }

        return $filtered;
    }

    public function getDisplayName(): string
    {
        $name = str_replace([' Manager', ' manager'], '', $this->pluginName);
        $singular = preg_replace('/s$/', '', $name) ?: $name;
        return $singular;
    }

    public function getFullName(): string
    {
        return $this->pluginName;
    }

    public function getPluralDisplayName(): string
    {
        return str_replace([' Manager', ' manager'], '', $this->pluginName);
    }

    public function getLowerDisplayName(): string
    {
        return strtolower($this->getDisplayName());
    }

    public function getPluralLowerDisplayName(): string
    {
        return strtolower($this->getPluralDisplayName());
    }
}

