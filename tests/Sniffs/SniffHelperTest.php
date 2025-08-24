<?php

declare(strict_types = 1);

namespace Pekral\PhpcsRulesBuild\Tests\Sniffs;

use Mockery;
use Pekral\PhpcsRulesBuild\Sniffs\SniffHelper;
use PHPUnit\Framework\TestCase;
use SplFileInfo;

final class SniffHelperTest extends TestCase
{

    public function testGetSniffNameWithSimplePath(): void
    {
        $fileInfo = Mockery::mock(SplFileInfo::class);
        $fileInfo->shouldReceive('getFilename')
            ->once()
            ->andReturn('ArrayIndentSniff.php');
        $fileInfo->shouldReceive('getPath')
            ->once()
            ->andReturn('Example/Arrays');

        $result = SniffHelper::getSniffName($fileInfo);

        $this->assertEquals('SlevomatCodingStandard.Arrays.ArrayIndent', $result);
    }

    public function testGetSniffNameWithNestedPath(): void
    {
        $fileInfo = Mockery::mock(SplFileInfo::class);
        $fileInfo->shouldReceive('getFilename')
            ->once()
            ->andReturn('PropertyDeclarationSniff.php');
        $fileInfo->shouldReceive('getPath')
            ->once()
            ->andReturn('Example/Classes/PropertyDeclaration');

        $result = SniffHelper::getSniffName($fileInfo);

        $this->assertEquals('SlevomatCodingStandard.PropertyDeclaration.PropertyDeclaration', $result);
    }

    public function testGetSniffNameWithoutSniffSuffix(): void
    {
        $fileInfo = Mockery::mock(SplFileInfo::class);
        $fileInfo->shouldReceive('getFilename')
            ->once()
            ->andReturn('Helper.php');
        $fileInfo->shouldReceive('getPath')
            ->once()
            ->andReturn('Example/Utilities');

        $result = SniffHelper::getSniffName($fileInfo);

        $this->assertEquals('SlevomatCodingStandard.Utilities.Helper', $result);
    }

    public function testGetSniffNameWithMultipleSniffSuffixes(): void
    {
        $fileInfo = Mockery::mock(SplFileInfo::class);
        $fileInfo->shouldReceive('getFilename')
            ->once()
            ->andReturn('SniffHelperSniff.php');
        $fileInfo->shouldReceive('getPath')
            ->once()
            ->andReturn('Example/Helpers');

        $result = SniffHelper::getSniffName($fileInfo);

        $this->assertEquals('SlevomatCodingStandard.Helpers.Helper', $result);
    }

    public function testGetAllSniffsFromRulesetWithActiveRules(): void
    {
        $rulesetContent = '<?xml version="1.0"?>
<ruleset name="Custom Ruleset">
	<rule ref="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
	<rule ref="SlevomatCodingStandard.Classes.ClassLength" />
	<rule ref="SlevomatCodingStandard.Functions.FunctionLength" />
</ruleset>';

        $tempFile = tempnam(sys_get_temp_dir(), 'ruleset');
        file_put_contents($tempFile, $rulesetContent);

        try {
            $result = SniffHelper::getAllSniffsFromRuleset($tempFile);

            $expected = [
                'SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys',
                'SlevomatCodingStandard.Classes.ClassLength',
                'SlevomatCodingStandard.Functions.FunctionLength',
            ];

            $this->assertEquals($expected, $result);
        } finally {
            unlink($tempFile);
        }
    }

    public function testGetAllSniffsFromRulesetWithExcludedRules(): void
    {
        $rulesetContent = '<?xml version="1.0"?>
<ruleset name="Custom Ruleset">
	<rule ref="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
	<exclude name="SlevomatCodingStandard.Classes.ClassLength" />
	<exclude name="SlevomatCodingStandard.Functions.FunctionLength" />
</ruleset>';

        $tempFile = tempnam(sys_get_temp_dir(), 'ruleset');
        file_put_contents($tempFile, $rulesetContent);

        try {
            $result = SniffHelper::getAllSniffsFromRuleset($tempFile);

            $expected = [
                'SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys',
                'SlevomatCodingStandard.Classes.ClassLength',
                'SlevomatCodingStandard.Functions.FunctionLength',
            ];

            $this->assertEquals($expected, $result);
        } finally {
            unlink($tempFile);
        }
    }

    public function testGetAllSniffsFromRulesetWithMixedRules(): void
    {
        $rulesetContent = $this->getMixedRulesRulesetContent();
        $tempFile = $this->createTempRulesetFile($rulesetContent);

        try {
            $result = SniffHelper::getAllSniffsFromRuleset($tempFile);

            $expected = [
                'SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys',
                'SlevomatCodingStandard.Classes.ClassLength',
                'SlevomatCodingStandard.Functions.FunctionLength',
                'SlevomatCodingStandard.ControlStructures.EarlyExit',
            ];

            $this->assertEquals($expected, $result);
        } finally {
            unlink($tempFile);
        }
    }

    public function testGetAllSniffsFromRulesetWithDuplicateRules(): void
    {
        $rulesetContent = '<?xml version="1.0"?>
<ruleset name="Custom Ruleset">
	<rule ref="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
	<rule ref="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
	<exclude name="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
</ruleset>';

        $tempFile = tempnam(sys_get_temp_dir(), 'ruleset');
        file_put_contents($tempFile, $rulesetContent);

        try {
            $result = SniffHelper::getAllSniffsFromRuleset($tempFile);

            $expected = ['SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys'];

            $this->assertEquals($expected, $result);
        } finally {
            unlink($tempFile);
        }
    }

    public function testGetAllSniffsFromRulesetWithEmptyRuleset(): void
    {
        $rulesetContent = '<?xml version="1.0"?>
<ruleset name="Custom Ruleset">
</ruleset>';

        $tempFile = tempnam(sys_get_temp_dir(), 'ruleset');
        file_put_contents($tempFile, $rulesetContent);

        try {
            $result = SniffHelper::getAllSniffsFromRuleset($tempFile);

            $this->assertEmpty($result);
        } finally {
            unlink($tempFile);
        }
    }

    public function testGetAllSniffsFromRulesetWithComplexRuleset(): void
    {
        $rulesetContent = $this->getComplexRulesetContent();
        $tempFile = $this->createTempRulesetFile($rulesetContent);

        try {
            $result = SniffHelper::getAllSniffsFromRuleset($tempFile);

            $expected = [
                'SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys',
                'SlevomatCodingStandard.Arrays.ArrayIndent',
                'SlevomatCodingStandard.Classes.ClassLength',
                'SlevomatCodingStandard.Classes.RequireAbstractOrFinal',
                'SlevomatCodingStandard.Functions.FunctionLength',
                'SlevomatCodingStandard.ControlStructures.EarlyExit',
                'SlevomatCodingStandard.Namespaces.UnusedUses',
            ];

            $this->assertEquals($expected, $result);
        } finally {
            unlink($tempFile);
        }
    }

    protected function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    private function getMixedRulesRulesetContent(): string
    {
        return '<?xml version="1.0"?>
<ruleset name="Custom Ruleset">
	<rule ref="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
	<rule ref="SlevomatCodingStandard.Classes.ClassLength" />
	<exclude name="SlevomatCodingStandard.Functions.FunctionLength" />
	<exclude name="SlevomatCodingStandard.ControlStructures.EarlyExit" />
</ruleset>';
    }

    private function getComplexRulesetContent(): string
    {
        return '<?xml version="1.0"?>
<ruleset name="Custom Ruleset">
	<description>Complex ruleset with various rules</description>
	
	<!-- Active rules -->
	<rule ref="SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys" />
	<rule ref="SlevomatCodingStandard.Arrays.ArrayIndent" />
	<rule ref="SlevomatCodingStandard.Classes.ClassLength" />
	<rule ref="SlevomatCodingStandard.Classes.RequireAbstractOrFinal" />
	
	<!-- Excluded rules -->
	<exclude name="SlevomatCodingStandard.Functions.FunctionLength" />
	<exclude name="SlevomatCodingStandard.ControlStructures.EarlyExit" />
	<exclude name="SlevomatCodingStandard.Namespaces.UnusedUses" />
	
	<!-- Some other configuration -->
	<arg name="extensions" value="php" />
	<arg name="parallel" value="80" />
</ruleset>';
    }

    private function createTempRulesetFile(string $content): string
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'ruleset');
        file_put_contents($tempFile, $content);

        return $tempFile;
    }

}
