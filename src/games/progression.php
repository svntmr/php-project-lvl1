<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\runGame;

const PROGRESSION_LENGTH = 10;

function run()
{
    $gameDescription = 'What number is missing in the progression?';
    $getGameData = function () {
        $logic = [];
        $startPoint = rand(1, 50);
        $step = rand(1, 50);
        $length = PROGRESSION_LENGTH;
        $hiddenKey = rand(0, $length);
        [$hiddenValue, $progression]  = generateProgressionWithHiddenValue($startPoint, $step, $length, $hiddenKey);
        $logic['question'] = implode(' ', $progression);
        $logic['correctAnswer'] = $hiddenValue;
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function generateProgressionWithHiddenValue(int $startPoint, int $step, int $length, int $hiddenKey)
{
    $progression = range($startPoint, $startPoint + $step * $length, $step);
    $hiddenValue = $progression[$hiddenKey];
    $progression[$hiddenKey] = '..';
    return [$hiddenValue, $progression];
}
