<?php

namespace Compositeur\Console;

use Composer\Command\ExecCommand as BaseExecCommand;

class ExecCommand extends BaseExecCommand
{
    protected function configure()
    {
        parent::configure();

        // Override command name
        $this
            ->setName('guillotine')
        ;
    }
}