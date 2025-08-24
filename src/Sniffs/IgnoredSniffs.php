<?php

declare(strict_types = 1);

namespace Pekral\PhpcsRulesBuild\Sniffs;

enum IgnoredSniffs
{

    public const array IGNORED_SNIFFS = [
        'SlevomatCodingStandard.Numbers.DisallowNumericLiteralSeparator',
        'SlevomatCodingStandard.TypeHints.UnionTypeHintFormat',
        'SlevomatCodingStandard.ControlStructures.NewWithoutParentheses',
        'SlevomatCodingStandard.Strings.DisallowVariableParsing',
        'SlevomatCodingStandard.Numbers.RequireNumericLiteralSeparator',
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
        'SlevomatCodingStandard.Attributes.AttributesOrder',
        'SlevomatCodingStandard.Namespaces.FullyQualifiedExceptions',
        'SlevomatCodingStandard.PHP.RequireExplicitAssertion',
        'SlevomatCodingStandard.Operators.RequireOnlyStandaloneIncrementAndDecrementOperators',
        'SlevomatCodingStandard.Attributes.DisallowMultipleAttributesPerLine',
    ];

}