<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
    */

    'preset' => 'symfony',

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. You can either add, remove or configure `Insights`. Keep in
    | mind, that all added `Insights` must belong to a specific `Metric`.
    |
    */

    'exclude' => [
        'Legacy/',
        'Migrations/',
        '/assets/',
        '/bin/',
        '/elm-stuff/',
        '/node_modules/',
        '/private/',
        '/public/',
        '/translations/',
        '/templates/',
        '/var/',
        '/vendor/',
    ],

    'add' => [
    ],

    'remove' => [
        \NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class,
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class,
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits::class,
        \NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff::class,
        \ObjectCalisthenics\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
        \ObjectCalisthenics\Sniffs\Files\ClassTraitAndInterfaceLengthSniff::class,
        \ObjectCalisthenics\Sniffs\Files\FunctionLengthSniff::class,
        \ObjectCalisthenics\Sniffs\Metrics\MethodPerClassLimitSniff::class,
        \ObjectCalisthenics\Sniffs\Metrics\PropertyPerClassLimitSniff::class,
        \ObjectCalisthenics\Sniffs\NamingConventions\ElementNameMinimalLengthSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\EmptyStatementSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff::class,
        \PHP_CodeSniffer\Standards\PSR2\Sniffs\Files\EndFileNewlineSniff::class,
        \PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer::class,
        \SlevomatCodingStandard\Sniffs\Classes\DisallowLateStaticBindingForConstantsSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousAbstractClassNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousExceptionNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousInterfaceNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousTraitNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class,
        \SlevomatCodingStandard\Sniffs\Commenting\InlineDocCommentDeclarationSniff::class,
        \SlevomatCodingStandard\Sniffs\Commenting\UselessFunctionDocCommentSniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowShortTernaryOperatorSniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowYodaComparisonSniff::class,
        \SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowArrayTypeHintSyntaxSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class,
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenSecurityIssues::class,
        \SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
        \NunoMaduro\PhpInsights\Domain\Insights\Composer\ComposerMustBeValid::class,
    ],

    'config' => [
        \PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class => [
            'order' => [ // List of strings defining order of elements.
                'use_trait',
                'constant_public',
                'constant_protected',
                'constant_private',
                'property_public_static',
                'property_protected_static',
                'property_private_static',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'magic',
                'phpunit',
                'method_public',
                'method_protected',
                'method_private',
            ],
            'sort_algorithm' => 'none', // possible values ['none', 'alpha']
        ],
        \PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer::class => [
            'operators' => ['=>' => 'align_single_space_minimal'],
        ],
        \SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class => [
            'linesCountBetweenAnnotationsGroups' => 0,
            'annotationsGroups'                  => [
                ['@package', '@author', '@copyright'],
            ],
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff::class => [
            'newlinesCountBetweenOpenTagAndDeclare' => 0,
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class => [
            'enableNativeTypeHint' => false,
        ],
        \SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff::class => [
            'maxLinesLength' => 40,
        ],
    ],
];
