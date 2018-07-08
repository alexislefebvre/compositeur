<?php

namespace Compositeur;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use Compositeur\Console\DiagnoseCommand;
use Compositeur\Console\ExecCommand;
use Compositeur\Console\ProhibitsCommand;
use Compositeur\Console\RequireCommand;
use Compositeur\Console\ShowCommand;
use Compositeur\Console\UpdateCommand;

class Plugin implements PluginInterface, Capable, CommandProvider
{
    public function activate(Composer $composer, IOInterface $io)
    {
    }

    public function getCapabilities()
    {
        return [
            CommandProvider::class => static::class,
        ];
    }

    public function getCommands()
    {
        return [
            new ExecCommand(),
            new DiagnoseCommand(),
            new ProhibitsCommand(),
            new RequireCommand(),
            new ShowCommand(),
            new UpdateCommand(),
        ];
    }
}