<?php
namespace Bazzoloviale\commands;

class JobCommand
{
    public $title;
    public $description;

    public function __construct($title, $description) {
        $this->title = $title;
        $this->description = $description;
    }

}