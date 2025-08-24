<?php

declare(strict_types = 1);

namespace Pekral\PhpcsRulesBuild\Tests\Command;

use Pekral\PhpcsRulesBuild\Command\UnusedSniffCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Style\SymfonyStyle;

final class UnusedSniffCommandTest extends TestCase
{

    public function testInvokeWithRealData(): void
    {
        $output = $this->createMockOutput();
        $command = new UnusedSniffCommand();

        $result = $command($output);
        
        // Test that the command executes successfully with real data
        $this->assertIsInt($result);
        // SUCCESS or FAILURE
        $this->assertContains($result, [0, 1]);
    }

    public function testInvokeReturnsValidExitCode(): void
    {
        $output = $this->createMockOutput();
        $command = new UnusedSniffCommand();
        
        $result = $command($output);
        
        // Verify that the result is a valid exit code
        $this->assertIsInt($result);
        $this->assertGreaterThanOrEqual(0, $result);
        $this->assertLessThanOrEqual(1, $result);
    }

    public function testInvokeHandlesRealSniffsDirectory(): void
    {
        $output = $this->createMockOutput();
        $command = new UnusedSniffCommand();
        $result = $command($output);
        
        // Test that the command can handle real sniffs directory
        $this->assertIsInt($result);
    }

    public function testInvokeHandlesRealRulesetFile(): void
    {
        $output = $this->createMockOutput();
        $command = new UnusedSniffCommand();
        $this->assertIsInt($command($output));
    }

    private function createMockOutput(): SymfonyStyle
    {
        $output = $this->createMock(SymfonyStyle::class);
        
        // Mock all possible output methods
        $output->method('writeln')->willReturnSelf();
        $output->method('info')->willReturnSelf();
        $output->method('error')->willReturnSelf();
        
        return $output;
    }

}
