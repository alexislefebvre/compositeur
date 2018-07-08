<?php

namespace Compositeur\Console;

use Composer\Command\UpdateCommand as BaseUpdateCommand;

class ProhibitsCommand extends BaseUpdateCommand
{
    protected function configure()
    {
        parent::configure();

        // Override command name
        $this->setName('censure');
    }
}

