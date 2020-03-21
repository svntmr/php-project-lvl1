<?php

namespace BrainGames\games\even;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getGameData = function () {
        $gameData = [];
        $number = rand(1, 50);
        $gameData['question'] = $number;
        $gameData['correctAnswer'] = isEven($number) ? 'yes' : 'no';
        return $gameData;
    };
    runGame($gameDescription, $getGameData);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
