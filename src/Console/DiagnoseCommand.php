<?php

namespace Compositeur\Console;

use Composer\Command\DiagnoseCommand as BaseDiagnoseCommand;

class DiagnoseCommand extends BaseDiagnoseCommand
{
    protected function configure()
    {
        parent::configure();

        // Override command name
        $this
            ->setName('docteur')
        ;
    }
}