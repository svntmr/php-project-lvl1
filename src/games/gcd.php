<?php

namespace BrainGames\games\gcd;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $getGameData = function () {
        $gameData = [];
        $firstNum = rand(1, 50);
        $secondNum = rand(1, 50);
        $gameData['question'] = "{$firstNum} {$secondNum}";
        $gameData['correctAnswer'] = gcd($firstNum, $secondNum);
        return $gameData;
    };
    runGame($gameDescription, $getGameData);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
