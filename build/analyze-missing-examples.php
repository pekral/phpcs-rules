<?php

declare(strict_types = 1);

// Script to find missing examples for rules defined in ruleset.xml

$rulesetFile = __DIR__ . '/../ruleset.xml';
$examplesDir = __DIR__ . '/../Example/';

if (!file_exists($rulesetFile)) {
    fwrite(STDERR, "ruleset.xml file not found: $rulesetFile\n");
    exit(1);
}

if (!is_dir($examplesDir)) {
    fwrite(STDERR, "Examples directory not found: $examplesDir\n");
    exit(1);
}

// Load ruleset.xml and find all rules
$ruleset = file_get_contents($rulesetFile);
preg_match_all('/<rule ref="([^"]+)"/', $ruleset, $matches);
$allRules = array_unique($matches[1]);

// Find existing examples
$existingExamples = [];

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($examplesDir)) as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $relativePath = str_replace($examplesDir, '', $file->getPathname());
        $relativePath = str_replace('.php', '', $relativePath);
        $existingExamples[] = $relativePath;
    }
}

// Convert rules to example paths
$ruleExamples = [];

foreach ($allRules as $rule) {
    // Handle different rule formats
    if (strpos($rule, 'SlevomatCodingStandard.') === 0) {
        $rule = str_replace('SlevomatCodingStandard.', '', $rule);
    } elseif (strpos($rule, 'Generic.') === 0) {
        $rule = str_replace('Generic.', '', $rule);
    } elseif (strpos($rule, 'PEAR.') === 0) {
        $rule = str_replace('PEAR.', '', $rule);
    } elseif (strpos($rule, 'PSR2.') === 0) {
        $rule = str_replace('PSR2.', '', $rule);
    } elseif (strpos($rule, 'Squiz.') === 0) {
        $rule = str_replace('Squiz.', '', $rule);
    }
    
    // Convert dots to slashes
    $rule = str_replace('.', '/', $rule);
    
    // Map WhiteSpace to Whitespace (fix case sensitivity)
    if (strpos($rule, 'WhiteSpace/') === 0) {
        $rule = str_replace('WhiteSpace/', 'Whitespace/', $rule);
    }
    
    $ruleExamples[] = $rule;
}

// Find missing examples
$missingExamples = array_diff($ruleExamples, $existingExamples);

echo "=== ANALYSIS OF MISSING EXAMPLES ===\n\n";
echo "Total rules in ruleset.xml: " . count($allRules) . "\n";
echo "Total existing examples: " . count($existingExamples) . "\n";
echo "Missing examples: " . count($missingExamples) . "\n\n";

if (count($missingExamples) === 0) {
    echo "All rules have examples! 🎉\n";
} else {
    echo "Missing examples:\n";

    foreach ($missingExamples as $missing) {
        echo "- $missing\n";
    }
    
    echo "\n=== CREATING MISSING EXAMPLES ===\n";
    
    foreach ($missingExamples as $missing) {
        $examplePath = $examplesDir . $missing . '.php';
        $dir = dirname($examplePath);
        
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
            echo "Created directory: $dir\n";
        }
        
        // Create example file based on category
        $category = explode('/', $missing)[0];
        $ruleName = basename($missing);
        
        $content = generateExampleContent($category, $ruleName);
        file_put_contents($examplePath, $content);
        echo "Created example: $examplePath\n";
    }
}

function generateExampleContent(string $category, string $ruleName): string
{
    $className = str_replace('/', '', $ruleName);

    return getGeneratorForCategory($category)($className);
}

function getGeneratorForCategory(string $category): callable
{
    $generators = getCategoryGeneratorMap();

    return $generators[$category] ?? 'generateGenericExample';
}

function getCategoryGeneratorMap(): array
{
    return array_merge(
        getBasicCategoryGenerators(),
        getAliasCategoryGenerators(),
    );
}

function getBasicCategoryGenerators(): array
{
    return [
        'Arrays' => 'generateArrayExample',
        'Classes' => 'generateClassExample',
        'Commenting' => 'generateCommentingExample',
        'Complexity' => 'generateComplexityExample',
        'ControlStructures' => 'generateControlStructureExample',
        'Exceptions' => 'generateExceptionExample',
        'Files' => 'generateFileExample',
        'Functions' => 'generateFunctionExample',
        'Methods' => 'generateMethodExample',
        'Namespaces' => 'generateNamespaceExample',
        'Numbers' => 'generateNumberExample',
        'Operators' => 'generateOperatorExample',
        'PHP' => 'generatePhpExample',
        'Strings' => 'generateStringExample',
        'TypeHints' => 'generateTypeHintExample',
        'Variables' => 'generateVariableExample',
    ];
}

function getAliasCategoryGenerators(): array
{
    return [
        'Naming' => 'generateNamingExample',
        'NamingConventions' => 'generateNamingExample',
        'WhiteSpace' => 'generateWhitespaceExample',
        'Whitespaces' => 'generateWhitespaceExample',
    ];
}

function generateArrayExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Arrays;

final class $className
{

    public function getArray(): array
    {
        return [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];
    }

}
";
}

function generateClassExample(string $className): string
{
    return getClassTemplate($className);
}

function getClassTemplate(string $className): string
{
    return getPhpHeader() . getClassBody($className) . getClassFooter();
}

function getPhpHeader(): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Classes;

";
}

function getClassBody(string $className): string
{
    return "final class $className
{

    public const string VERSION = '1.0';

    public function __construct(private int \$id)
    {
    }

    public function getId(): int
    {
        return \$this->id;
    }

";
}

function getClassFooter(): string
{
    return "}
";
}

function generateCommentingExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Commenting;

final class $className
{

    /**
     * Example method
     */
    public function example(): void
    {
        // Example comment
    }

}
";
}

function generateControlStructureExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\ControlStructures;

final class $className
{

    public function example(int \$value): string
    {
        if (\$value > 0) {
            return 'positive';
        }
        
        return 'negative';
    }

}
";
}

function generateExceptionExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Exceptions;

final class $className
{

    public function example(): void
    {
        try {
            // Some operation
        } catch (\\Exception \$e) {
            // Handle exception
        }
    }

}
";
}

function generateFunctionExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Functions;

final class $className
{

    public function example(): void
    {
        // Function implementation
    }

}
";
}

function generateNamespaceExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Namespaces;

use Example\\Classes\\ClassStructure;

final class $className
{

    public function example(): void
    {
        // Namespace usage example
    }

}
";
}

function generateTypeHintExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\TypeHints;

final class $className
{

    public function example(string \$param): int
    {
        return strlen(\$param);
    }

}
";
}

function generateVariableExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Variables;

final class $className
{

    public function example(): void
    {
        \$variable = 'value';
        // Variable usage example
    }

}
";
}

function generatePhpExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\PHP;

final class $className
{

    public function example(): void
    {
        // PHP language feature example
    }

}
";
}

function generateOperatorExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Operators;

final class $className
{

    public function example(int \$a, int \$b): int
    {
        return \$a + \$b;
    }

}
";
}

function generateNumberExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Numbers;

final class $className
{

    public function example(): int
    {
        return 42;
    }

}
";
}

function generateFileExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Files;

final class $className
{

    public function example(): void
    {
        // File-related example
    }

}
";
}

function generateComplexityExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Complexity;

final class $className
{

    public function example(): void
    {
        // Complexity example
    }

}
";
}

function generateWhitespaceExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Whitespace;

final class $className
{

    public function example(): void
    {
        // Whitespace formatting example
    }

}
";
}

function generateStringExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Strings;

final class $className
{

    public function example(): string
    {
        return 'example string';
    }

}
";
}

function generateNamingExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Naming;

final class $className
{

    public function example(): void
    {
        // Naming convention example
    }

}
";
}

function generateMethodExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\Methods;

final class $className
{

    public function example(): void
    {
        // Method example
    }

}
";
}

function generateGenericExample(string $className): string
{
    return "<?php

declare(strict_types = 1);

namespace Example\\$className;

final class $className
{

    public function example(): void
    {
        // Generic example
    }

}
";
}
