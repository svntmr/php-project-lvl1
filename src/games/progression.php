<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\runGame;

const PROGRESSION_LENGTH = 10;

function run()
{
    $gameDescription = 'What number is missing in the progression?';
    $getGameData = function () {
        $gameData = [];
        $startPoint = rand(1, 50);
        $step = rand(1, 50);
        $length = PROGRESSION_LENGTH;
        $progression = generateProgression($startPoint, $step, $length);

        $hiddenKey = array_rand($progression);
        $answer = $progression[$hiddenKey];
        $progression[$hiddenKey] = '..';
        $gameData['question'] = implode(' ', $progression);
        $gameData['correctAnswer'] = $answer;
        return $gameData;
    };
    runGame($gameDescription, $getGameData);
}

function generateProgression(int $start, int $step, int $lenght)
{
    $result = [];
    for ($i = 0; $i < $lenght; $i++) {
        $item = $start + ($step * $i);
        $result[] = $item;
    }

    return $result;
}
