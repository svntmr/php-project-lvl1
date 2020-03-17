<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'What number is missing in the progression?';
    $getGameData = function () {
        $logic = [];
        [$removedElement, $numbers] = createProgressionArray();
        $logic['question'] = implode(' ', $numbers);
        $logic['correctAnswer'] = $removedElement;
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function createProgressionArray()
{
    $start = rand(1, 50);
    $step = rand(1, 10);
    $steps = 10;
    $numbers = range($start, $start + $step * $steps, $step);
    $randomKey = array_rand($numbers);
    $removedElement = $numbers[$randomKey];
    $numbers[$randomKey] = '..';

    return [$removedElement, $numbers];
}
