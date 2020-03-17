<?php

namespace BrainGames\games\even;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getGameData = function () {
        $logic = [];
        $number = rand(1, 50);
        $logic['question'] = $number;
        $logic['correctAnswer'] = checkIfNumberEven($number);
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function checkIfNumberEven(int $number)
{
    $isEven = $number % 2 === 0 ? 'yes' : 'no';
    return $isEven;
}
