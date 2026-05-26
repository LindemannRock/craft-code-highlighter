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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'إدارة إعدادات Prism.js وسلوك حقول الكود من منطقة إعدادات الإضافة.',
    'Open Code Highlighter' => 'فتح Code Highlighter',

    // Settings: General
    'General' => 'عام',
    'Theme' => 'السمة',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'سمة Prism لتمييز البنية (يمكن تجاوزها لكل صفحة باستخدام craft.codeHighlighter.setTheme())',
    'Default Language' => 'اللغة الافتراضية',
    'Default language for new Code Highlighter fields' => 'اللغة الافتراضية لحقول Code Highlighter الجديدة',
    'Default Font Size' => 'حجم الخط الافتراضي',
    'Default font size for new Code Highlighter fields' => 'حجم الخط الافتراضي لحقول Code Highlighter الجديدة',
    'Font Family (Optional)' => 'عائلة الخط (اختياري)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'عائلة خط مخصصة لكتل الكود (اتركها فارغة لاستخدام الإعداد الافتراضي للسمة)',
    'Enable Line Numbers' => 'تفعيل أرقام الأسطر',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'عرض أرقام الأسطر في كتل الكود في الواجهة الأمامية افتراضياً (يمكن تجاوزه لكل حقل)',
    'Enable Copy Button' => 'تفعيل زر Copy',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'إضافة زر «Copy» إلى كتل الكود في الواجهة الأمامية افتراضياً (يمكن تجاوزه لكل كتلة عبر خيارات العرض)',
    'Enable Match Braces' => 'تفعيل مطابقة الأقواس',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'تمييز الأقواس المربعة والمعقوفة والمستديرة المتطابقة عند التمرير (يمكن تجاوزه لكل كتلة عبر خيارات العرض)',
    'Enable Inline Color' => 'تفعيل الألوان المضمنة',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'عرض معاينات الألوان المضمنة بجانب قيم ألوان CSS (hex, rgb, الألوان المسماة). يُطبَّق على جميع كتل الكود في الصفحة عند التفعيل.',
    'Available Languages' => 'اللغات المتاحة',
    'Select languages available in field settings dropdowns' => 'تحديد اللغات المتاحة في قوائم إعدادات الحقول المنسدلة',
    'Default language (always included)' => 'اللغة الافتراضية (مدرجة دائماً)',
    '(default)' => '(افتراضي)',

    // Settings: Field
    'Language' => 'اللغة',
    'Default language for this field (must be enabled in Available Languages below)' => 'اللغة الافتراضية لهذا الحقل (يجب تفعيلها في اللغات المتاحة أدناه)',
    'Show Language Dropdown' => 'عرض قائمة اللغة المنسدلة',
    'Show language switcher dropdown in the editor' => 'عرض القائمة المنسدلة لتبديل اللغة في المحرر',
    'Editor' => 'المحرر',
    'Rows' => 'الصفوف',
    'Number of visible rows in the field editor (1 row = 21px)' => 'عدد الصفوف المرئية في محرر الحقل (1 صف = 21px)',
    'Tab Width' => 'عرض المسافة البادئة',
    'Number of spaces per tab character' => 'عدد المسافات لكل حرف جدولة',
    'Font Size' => 'حجم الخط',
    'Font size for the field editor' => 'حجم الخط لمحرر الحقل',
    'Word Wrap' => 'التفاف النص',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'التفاف الأسطر الطويلة بدلاً من التمرير الأفقي. قد يؤثر على قابلية قراءة الكود ومحاذاة أرقام الأسطر.',
    'Frontend Output' => 'مخرجات الواجهة الأمامية',
    'Line Numbers' => 'أرقام الأسطر',
    'Show line numbers in frontend code blocks' => 'عرض أرقام الأسطر في كتل الكود في الواجهة الأمامية',
    'On' => 'تشغيل',
    'Off' => 'إيقاف',
    'Copy Button' => 'زر Copy',
    'Show copy-to-clipboard button on frontend code blocks' => 'عرض زر النسخ إلى الحافظة على كتل الكود في الواجهة الأمامية',
    'Match Braces' => 'مطابقة الأقواس',
    'Highlight matching braces, brackets, and parentheses on hover' => 'تمييز الأقواس المعقوفة والمربعة والمستديرة المتطابقة عند التمرير',
    'Default Content' => 'المحتوى الافتراضي',
    'Default Value' => 'القيمة الافتراضية',
    'Default code to populate the field with (optional)' => 'الكود الافتراضي لملء الحقل (اختياري)',
    'Available Languages (Optional)' => 'اللغات المتاحة (اختياري)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'تجاوز اللغات المتاحة لهذا الحقل (اتركه فارغاً لاستخدام الإعدادات الافتراضية للإضافة)',
    'Field default language (always included)' => 'اللغة الافتراضية للحقل (مدرجة دائماً)',
    '(field default)' => '(افتراضي الحقل)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => 'تم العثور على {count, number} {count, plural, =1{خطأ} other{أخطاء}}',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>defaultTheme</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>defaultLanguage</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>defaultFontSize</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>fontFamily</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>enableLineNumbers</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>enableCopyButton</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>enableMatchBraces</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>enableInlineColor</code> في <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'يتم تجاوز هذا الإعداد بواسطة إعداد <code>availableLanguages</code> في <code>config/code-highlighter.php</code>.',
];
