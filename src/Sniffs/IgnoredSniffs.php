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
        'SlevomatCodingStandard.Numbers.DisallowNumericLiteralSeparator',
        // Ignore this sniff, is deprecated for version 9.0.0
        'SlevomatCodingStandard.TypeHints.UnionTypeHintFormat',
        'SlevomatCodingStandard.ControlStructures.NewWithoutParentheses',
        'SlevomatCodingStandard.Classes.DisallowMultiConstantDefinition',
        'SlevomatCodingStandard.Classes.DisallowMultiPropertyDefinition',
        'SlevomatCodingStandard.Classes.RequireAbstractOrFinal',
        'SlevomatCodingStandard.Classes.DisallowConstructorPropertyPromotion',
        'SlevomatCodingStandard.PHP.UselessParentheses',
        'SlevomatCodingStandard.PHP.DisallowReference',
        'SlevomatCodingStandard.Exceptions.DisallowNonCapturingCatch',
        'SlevomatCodingStandard.Namespaces.FullyQualifiedGlobalConstants',
        'SlevomatCodingStandard.Namespaces.FullyQualifiedGlobalFunctions',
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