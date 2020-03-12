<?php

namespace BrainGames\games\divisor;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $gameLogic = function () {
        $logic = [];
        $parameters = generateQuestion();
        $question = implode(' ', $parameters);
        $logic['question'] = $question;
        [$a, $b] = $parameters;
        $logic['correctAnswer'] = gcd($a, $b);
        return $logic;
    };
    runGame($gameDescription, $gameLogic);
}

function generateQuestion()
{
    $firstNumber = rand(1, 50);
    $secondNumber = rand(1, 50);
    return [$firstNumber, $secondNumber];
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
