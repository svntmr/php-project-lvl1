<?php

namespace BrainGames\Cli;

use function cli\{line, prompt};

function welcome(string $gameDescription)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line();
    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);
    line();
    return $name;
}

function bue(string $answer, string $rightAnswer, string $name)
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
    line("Let's try again, {$name}!");
}

function congratulationsTo(string $name)
{
    line("Congratulations, {$name}!");
}
