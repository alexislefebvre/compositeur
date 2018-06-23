<?php

namespace Compositeur\Console;

use Composer\Command\ShowCommand as BaseShowCommand;

class ShowCommand extends BaseShowCommand
{
    protected function configure()
    {
        parent::configure();

        // Override command name
        $this
            ->setName('spectacle')
        ;
    }
}