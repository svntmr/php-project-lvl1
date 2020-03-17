<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'What number is missing in the progression?';
    $getGameData = function () {
        $logic = [];
        [$hiddenValue, $progression] = generateProgressionWithHiddenValue();
        $logic['question'] = implode(' ', $progression);
        $logic['correctAnswer'] = $hiddenValue;
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function generateProgressionWithHiddenValue()
{
    $start = rand(1, 50);
    $step = rand(1, 10);
    $steps = 10;
    $progression = range($start, $start + $step * $steps, $step);
    $randomKey = array_rand($progression);
    $hiddenValue = $progression[$randomKey];
    $progression[$randomKey] = '..';

    return [$hiddenValue, $progression];
}
