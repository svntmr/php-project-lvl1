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
        $logic['correctAnswer'] = isEven($number) ? 'yes' : 'no';
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
