<?php
namespace Bazzoloviale\commands;
use Laracasts\Commander\CommandBus;

class JobSanitizeDecorator implements CommandBus
{
    public function execute($command) {
        var_dump("Los valores han sido sanitizados");
    }

}