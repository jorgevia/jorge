<?php
namespace Bazzoloviale\commands;
use Laracasts\Commander\CommandHandler;

class JobCommandHandler implements CommandHandler{

    public function handle($command) {
        var_dump($command->title);
        var_dump($command->description);
        var_dump("Hanlding the process of doing something");
    }
}