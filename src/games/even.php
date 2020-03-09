<?php

namespace BrainGames\games\even;

use function cli\{line, prompt};
use function BrainGames\Cli\{welcome, bue, congratulationsTo};

use const BrainGames\Cli\ROUNDS;

function run()
{
    $name = welcome('Answer "yes" if the number is even, otherwise answer "no".');
    $counter = 0;
    while ($counter < ROUNDS) {
        $number = rand(0, 50);
        line("Question: {$number}");
        $check = prompt("Your answer");
        $return = checkIfNumberEven($number, $check, $name);
        if (! $return) {
            break;
        }
        $counter++;
    }
    if ($counter === ROUNDS) {
        congratulationsTo($name);
    }
}

function checkIfNumberEven(int $number, string $answer, string $name)
{
    $result = true;
    $isEven = $number % 2 === 0 ? 'yes' : 'no';
    if ($answer !== $isEven) {
        bue($answer, $isEven, $name);
        $result = false;
    } else {
        line('Correct!');
    }
    return $result;
}
