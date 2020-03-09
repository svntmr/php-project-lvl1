<?php

namespace BrainGames\games\even;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameLogic = function () {
        $logic = [];
        $number = rand(1, 50);
        $logic['question'] = $number;
        $logic['correctAnswer'] = checkIfNumberEven($number);
        return $logic;
    };
    runGame($gameDescription, $gameLogic);
}

function checkIfNumberEven(int $number)
{
    $isEven = $number % 2 === 0 ? 'yes' : 'no';
    return $isEven;
}
