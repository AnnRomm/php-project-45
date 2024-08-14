<?php

namespace  Php\Project\Cli;

use function cli\line;
use function cli\prompt;

function greetUser()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
}
