<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'What number is missing in the progression?';
    $gameLogic = function () {
        $logic = [];
        [$removedElement, $numbersArray] = createProgressionArray();
        $logic['question'] = implode(' ', $numbersArray);
        $logic['correctAnswer'] = $removedElement;
        return $logic;
    };
    runGame($gameDescription, $gameLogic);
}

function createProgressionArray()
{
    $start = rand(1, 50);
    $step = rand(1, 10);
    $steps = 10;
    $numbersArray = range($start, $start + $step * $steps, $step);
    $randomKey = array_rand($numbersArray);
    $removedElement = $numbersArray[$randomKey];
    $numbersArray[$randomKey] = '..';

    return [$removedElement, $numbersArray];
}
