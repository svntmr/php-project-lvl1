<?php

namespace BrainGames\games\divisor;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $getGameData = function () {
        $logic = [];
        $firstNum = rand(1, 50);
        $secondNum = rand(1, 50);
        $logic['question'] = "{$firstNum} {$secondNum}";
        $logic['correctAnswer'] = gcd($firstNum, $secondNum);
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
