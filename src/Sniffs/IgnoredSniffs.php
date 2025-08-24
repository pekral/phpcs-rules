<?php

declare(strict_types = 1);

namespace Pekral\PhpcsRulesBuild\Sniffs;

use function array_merge;

enum IgnoredSniffs
{

    public const array IGNORED_INTERNAL_SNIFFS = [
        'SlevomatCodingStandard.Classes.UnsupportedClassGroupException',
        'SlevomatCodingStandard.Classes.AbstractMethodSignature',
        'SlevomatCodingStandard.Classes.AbstractPropertyConstantAndEnumCaseSpacing',
        'SlevomatCodingStandard.Classes.MissingClassGroupsException',
        'SlevomatCodingStandard.Namespaces.AbstractFullyQualifiedGlobalReference',
        'SlevomatCodingStandard.Files.FilepathNamespaceExtractor',
        'SlevomatCodingStandard.Functions.AbstractLineCall',
        'SlevomatCodingStandard.ControlStructures.AbstractControlStructureSpacing',
        'SlevomatCodingStandard.ControlStructures.UnsupportedKeywordException',
        'SlevomatCodingStandard.ControlStructures.AbstractLineCondition',
        'SlevomatCodingStandard.Commenting.AbstractRequireOneLineDocComment',
        'SlevomatCodingStandard.Sniffs.TestCase',
    ];

    public const array IGNORED_SNIFFS = [
        // Ignore this sniff
        'SlevomatCodingStandard.Numbers.DisallowNumericLiteralSeparator',
        // Ignore this sniff, is deprecated for version 9.0.0
        'SlevomatCodingStandard.TypeHints.UnionTypeHintFormat',
        // Ignore this sniff
        'SlevomatCodingStandard.ControlStructures.NewWithoutParentheses',
        // Ignore this sniff
        'SlevomatCodingStandard.Classes.DisallowMultiConstantDefinition',
        // Ignore this sniff
        'SlevomatCodingStandard.Classes.DisallowMultiPropertyDefinition',
        // Ignore this sniff
        'SlevomatCodingStandard.Classes.DisallowConstructorPropertyPromotion',
        // Ignore this sniff
        'SlevomatCodingStandard.Exceptions.DisallowNonCapturingCatch',
        // Ignore this sniff
        'SlevomatCodingStandard.Namespaces.FullyQualifiedGlobalConstants',
        // Ignore this sniff
        'SlevomatCodingStandard.Namespaces.FullyQualifiedGlobalFunctions',
        // Ignore this sniff
        'SlevomatCodingStandard.Namespaces.UseOnlyWhitelistedNamespaces',
        // Ignore this sniff
        'SlevomatCodingStandard.Commenting.RequireOneLinePropertyDocComment',
        // Ignore this sniff
        'SlevomatCodingStandard.Commenting.RequireOneLineDocComment',
        // Ignore this sniff
        'SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint',
        // Ignore this sniff
        'SlevomatCodingStandard.ControlStructures.DisallowNullSafeObjectOperator',
        // Ignore this sniff
        'SlevomatCodingStandard.ControlStructures.DisallowShortTernaryOperator',
        // Ignore this sniff
        'SlevomatCodingStandard.ControlStructures.RequireSingleLineCondition',
        // Ignore this sniff
        'SlevomatCodingStandard.ControlStructures.RequireYodaComparison',
        // Ignore this sniff
        'SlevomatCodingStandard.Functions.DisallowArrowFunction',
        // Ignore this sniff
        'SlevomatCodingStandard.Functions.DisallowTrailingCommaInCall',
        // Ignore this sniff
        'SlevomatCodingStandard.Functions.RequireTrailingCommaInClosureUse',
        // Ignore this sniff
        'SlevomatCodingStandard.Functions.DisallowNamedArguments',
        // Ignore this sniff
        'SlevomatCodingStandard.Files.TypeNameMatchesFileName',
        // Ignore this sniff
        'SlevomatCodingStandard.Attributes.DisallowAttributesJoining',
        // Ignore this sniff
        'SlevomatCodingStandard.Namespaces.FullyQualifiedExceptions',
        // Ignore this sniff
        'SlevomatCodingStandard.Attributes.DisallowMultipleAttributesPerLine',
        // Ignore this sniff
        'SlevomatCodingStandard.Operators.DisallowIncrementAndDecrementOperators',
        // Ignore this sniff
        'SlevomatCodingStandard.Functions.DisallowTrailingCommaInDeclaration',
    ];

    public static function getAllIgnoredSniffs(): array
    {
        return array_merge(self::IGNORED_INTERNAL_SNIFFS, self::IGNORED_SNIFFS);
    }

}