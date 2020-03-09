<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line();
    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);
    line();
    $counter = 0;
    while ($counter < 3) {
        $number = rand(0, 50);
        line("Question: {$number}");
        $check = prompt("Your answer");
        $return = checkIfNumberEven($number, $check, $name);
        if (! $return) {
            break;
        }
        $counter++;
    }
    if ($counter === 3) {
        line("Congratulations, {$name}!");
    }
}

function checkIfNumberEven(int $number, string $answer, string $name)
{
    $result = true;
    $authorizedAnswers = ['yes', 'no'];
    $isEven = $number % 2 === 0 ? 'yes' : 'no';
    if (! in_array($answer, $authorizedAnswers) or $answer !== $isEven) {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$isEven}'.");
        line("Let's try again, {$name}!");
        $result = false;
    } else {
        line('Correct!');
    }
    return $result;
}
