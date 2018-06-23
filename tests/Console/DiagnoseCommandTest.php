<?php

namespace Compositeur\Tests;

use Compositeur\Console\DiagnoseCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class DiagnoseCommandTest extends TestCase
{
    public function testExecute()
    {
        $commandTester = new CommandTester(new DiagnoseCommand());
        $commandTester->execute([], ['-v']);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertSame('', $output);
    }
}
