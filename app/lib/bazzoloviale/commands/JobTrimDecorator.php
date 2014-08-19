<?php
namespace Bazzoloviale\commands;
use Laracasts\Commander\CommandBus;

class JobTrimDecorator implements CommandBus
{
    public function execute($command) {
        $command->title = trim($command->title);
        $command->description = trim($command->description);
        var_dump("Los valores han sido trimeados");
    }

}