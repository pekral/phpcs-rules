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
        'SlevomatCodingStandard.Commenting.DeprecatedAnnotationDeclaration',
        'SlevomatCodingStandard.Commenting.RequireOneLinePropertyDocComment',
        'SlevomatCodingStandard.Commenting.RequireOneLineDocComment',
        'SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint',
        'SlevomatCodingStandard.ControlStructures.DisallowNullSafeObjectOperator',
        'SlevomatCodingStandard.ControlStructures.RequireNullSafeObjectOperator',
        'SlevomatCodingStandard.ControlStructures.DisallowShortTernaryOperator',
        'SlevomatCodingStandard.ControlStructures.RequireSingleLineCondition',
        'SlevomatCodingStandard.ControlStructures.RequireYodaComparison',
        'SlevomatCodingStandard.Functions.DisallowArrowFunction',
        'SlevomatCodingStandard.Functions.DisallowTrailingCommaInCall',
        'SlevomatCodingStandard.Functions.RequireTrailingCommaInClosureUse',
        'SlevomatCodingStandard.Functions.DisallowTrailingCommaInDeclaration',
        'SlevomatCodingStandard.Functions.DisallowTrailingCommaInClosureUse',
        'SlevomatCodingStandard.Functions.DisallowNamedArguments',
        'SlevomatCodingStandard.Files.TypeNameMatchesFileName',
        'SlevomatCodingStandard.Attributes.DisallowAttributesJoining',
        'SlevomatCodingStandard.Attributes.AttributeAndTargetSpacing',
        'SlevomatCodingStandard.Namespaces.FullyQualifiedExceptions',
        'SlevomatCodingStandard.Operators.RequireOnlyStandaloneIncrementAndDecrementOperators',
        'SlevomatCodingStandard.Attributes.DisallowMultipleAttributesPerLine',
    ];

    public static function getAllIgnoredSniffs(): array
    {
        return array_merge(self::IGNORED_INTERNAL_SNIFFS, self::IGNORED_SNIFFS);
    }

}