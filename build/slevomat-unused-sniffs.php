<?php

declare(strict_types = 1);

$ignoredRules = [
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
    'SlevomatCodingStandard.Files.LineLength',
    'SlevomatCodingStandard.Attributes.DisallowAttributesJoining',
    'SlevomatCodingStandard.Attributes.AttributeAndTargetSpacing',
    'SlevomatCodingStandard.Attributes.AttributesOrder',
    'SlevomatCodingStandard.Namespaces.FullyQualifiedExceptions',
    'SlevomatCodingStandard.PHP.RequireExplicitAssertion',
    'SlevomatCodingStandard.Operators.RequireOnlyStandaloneIncrementAndDecrementOperators',
    'SlevomatCodingStandard.Attributes.DisallowMultipleAttributesPerLine',
];

// Script to find unused Slevomat sniffs in ruleset.xml

// Path to sniffs directory
$sniffsDir = __DIR__ . '/../vendor/slevomat/coding-standard/SlevomatCodingStandard/Sniffs/';
$rulesetFile = __DIR__ . '/../ruleset.xml';

if (!is_dir($sniffsDir)) {
    fwrite(STDERR, "Sniffs directory not found: $sniffsDir\n");
    exit(1);
}

if (!file_exists($rulesetFile)) {
    fwrite(STDERR, "ruleset.xml file not found: $rulesetFile\n");
    exit(1);
}

// Find all sniffs
$allSniffs = [];

foreach (new DirectoryIterator($sniffsDir) as $category) {
    if ($category->isDot() || !$category->isDir())

    continue;

    $catName = $category->getFilename();

    foreach (new DirectoryIterator($category->getPathname()) as $sniff) {
        if ($sniff->isDot() || !$sniff->isFile() || substr($sniff->getFilename(), -9) !== 'Sniff.php')

        continue;

        $sniffName = substr($sniff->getFilename(), 0, -9);
        $allSniffs[] = "SlevomatCodingStandard.$catName.$sniffName";
    }
}

// Load ruleset.xml and find used Slevomat sniffs
$ruleset = file_get_contents($rulesetFile);
preg_match_all('/<rule ref="(SlevomatCodingStandard\\.[^"]+)"/', $ruleset, $matches);
$usedSniffs = array_unique($matches[1]);

// Print unused sniffs
$unused = array_diff($allSniffs, $usedSniffs);

if (count($unused) === 0) {
    echo "All Slevomat sniffs are used in ruleset.xml\n";
} else {
    echo "Unused Slevomat sniffs in ruleset.xml:\n";

    foreach ($unused as $sniff) {
        if (!in_array($sniff, $ignoredRules, true)) {
            echo "- $sniff\n";
        }
    }
} 