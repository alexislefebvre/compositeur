<?php

namespace Compositeur\Console;

use Composer\Command\UpdateCommand as BaseUpdateCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends BaseUpdateCommand
{
    protected function configure()
    {
        parent::configure();

        // Override command name
        $this
            ->setName('met-a-jour')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return parent::execute($input, $output);
    }
}