<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

return [
    // Plugin meta
    'Code Highlighter' => 'Code Highlighter',
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Gérez les paramètres Prism.js et le comportement des champs de code depuis la zone de paramètres du plugin.',
    'Open Code Highlighter' => 'Ouvrir Code Highlighter',

    // Settings: General
    'General' => 'Général',
    'Theme' => 'Thème',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Thème Prism pour la coloration syntaxique (peut être remplacé par page avec craft.codeHighlighter.setTheme())',
    'Default Language' => 'Langue par défaut',
    'Default language for new Code Highlighter fields' => 'Langue par défaut pour les nouveaux champs Code Highlighter',
    'Default Font Size' => 'Taille de police par défaut',
    'Default font size for new Code Highlighter fields' => 'Taille de police par défaut pour les nouveaux champs Code Highlighter',
    '8px - Tiny' => '8px - Minuscule',
    '10px - Very Small' => '10px - Très petit',
    '12px - Small' => '12px - Petit',
    '14px - Normal' => '14px - Normal',
    '16px - Medium' => '16px - Moyen',
    '18px - Large' => '18px - Grand',
    '20px - Very Large' => '20px - Très grand',
    '24px - Huge' => '24px - Énorme',
    'Font Family (Optional)' => 'Famille de police (Facultatif)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Famille de police personnalisée pour les blocs de code (laisser vide pour utiliser le thème par défaut)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'p. ex. JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Activer les numéros de ligne',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Afficher les numéros de ligne dans les blocs de code frontend par défaut (peut être remplacé par champ)',
    'Enable Copy Button' => 'Activer le bouton Copy',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Ajouter un bouton « Copy » aux blocs de code frontend par défaut (peut être remplacé par bloc via les options de rendu)',
    'Enable Match Braces' => 'Activer la correspondance des accolades',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Mettre en surbrillance les crochets, accolades et parenthèses correspondants au survol (peut être remplacé par bloc via les options de rendu)',
    'Enable Inline Color' => 'Activer les couleurs en ligne',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Afficher les aperçus de couleurs en ligne à côté des valeurs de couleur CSS (hex, rgb, couleurs nommées). S\'applique à tous les blocs de code de la page lorsqu\'activé.',
    'Available Languages' => 'Langues disponibles',
    'Select languages available in field settings dropdowns' => 'Sélectionner les langues disponibles dans les menus déroulants des paramètres de champ',
    'Default language (always included)' => 'Langue par défaut (toujours incluse)',
    '(default)' => '(défaut)',

    // Settings: Field
    'Language' => 'Langue',
    'Default language for this field (must be enabled in Available Languages below)' => 'Langue par défaut pour ce champ (doit être activée dans les langues disponibles ci-dessous)',
    'Show Language Dropdown' => 'Afficher le menu de langue',
    'Show language switcher dropdown in the editor' => 'Afficher le menu déroulant de sélection de langue dans l\'éditeur',
    'Editor' => 'Éditeur',
    'Rows' => 'Lignes',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Nombre de lignes visibles dans l\'éditeur de champ (1 ligne = 21px)',
    'Tab Width' => 'Largeur de tabulation',
    'Number of spaces per tab character' => 'Nombre d\'espaces par caractère de tabulation',
    'Font Size' => 'Taille de police',
    'Font size for the field editor' => 'Taille de police pour l\'éditeur de champ',
    'Use Plugin Default ({value})' => 'Utiliser le défaut du plugin ({value})',
    'Word Wrap' => 'Retour à la ligne',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Renvoyer les longues lignes à la ligne au lieu de défiler horizontalement. Peut affecter la lisibilité du code et l\'alignement des numéros de ligne.',
    'Frontend Output' => 'Sortie frontend',
    'Line Numbers' => 'Numéros de ligne',
    'Show line numbers in frontend code blocks' => 'Afficher les numéros de ligne dans les blocs de code frontend',
    'On' => 'Activé',
    'Off' => 'Désactivé',
    'Copy Button' => 'Bouton Copy',
    'Show copy-to-clipboard button on frontend code blocks' => 'Afficher le bouton copier dans le presse-papiers sur les blocs de code frontend',
    'Match Braces' => 'Correspondance des accolades',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Mettre en surbrillance les accolades, crochets et parenthèses correspondants au survol',
    'Default Content' => 'Contenu par défaut',
    'Default Value' => 'Valeur par défaut',
    'Default code to populate the field with (optional)' => 'Code par défaut pour remplir le champ (facultatif)',
    'Available Languages (Optional)' => 'Langues disponibles (Facultatif)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Remplacer les langues disponibles pour ce champ (laisser vide pour utiliser les valeurs par défaut du plugin)',
    'Field default language (always included)' => 'Langue par défaut du champ (toujours incluse)',
    '(field default)' => '(défaut du champ)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{erreur trouvée} other{erreurs trouvées}}',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>defaultTheme</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>defaultLanguage</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>defaultFontSize</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>fontFamily</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>enableLineNumbers</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>enableCopyButton</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>enableMatchBraces</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>enableInlineColor</code> dans <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Ce paramètre est remplacé par le paramètre <code>availableLanguages</code> dans <code>config/code-highlighter.php</code>.',
];
