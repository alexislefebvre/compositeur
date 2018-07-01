<?php

namespace Compositeur\Console;

use Composer\Command\RequireCommand as BaseRequireCommand;

class RequireCommand extends BaseRequireCommand
{
    protected function configure()
    {
        parent::configure();

        // Override command name
        $this
            ->setName('exige')
        ;
    }
}