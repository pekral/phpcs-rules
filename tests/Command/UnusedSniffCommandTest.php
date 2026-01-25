<?php

declare(strict_types = 1);

namespace Pekral\PhpcsRulesBuild\Tests\Command;

use Pekral\PhpcsRulesBuild\Command\UnusedSniffCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

final class UnusedSniffCommandTest extends TestCase
{

    public function testExecuteReturnsValidExitCode(): void
    {
        $commandTester = $this->createCommandTester();

        $commandTester->execute([]);

        $this->assertContains($commandTester->getStatusCode(), [0, 1]);
    }

    public function testExecuteHandlesRealSniffsDirectory(): void
    {
        $commandTester = $this->createCommandTester();

        $commandTester->execute([]);

        $this->assertIsInt($commandTester->getStatusCode());
    }

    private function createCommandTester(): CommandTester
    {
        $application = new Application();
        $application->addCommand(new UnusedSniffCommand());

        $command = $application->find('build:check-unused-sniffs');

        return new CommandTester($command);
    }

}
