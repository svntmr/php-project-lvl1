<?php

namespace BrainGames\games\prime;

use function BrainGames\engine\runGame;

function run()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getGameData = function () {
        $gameData = [];
        $number = rand(0, 10000);
        $gameData['question'] = $number;
        $gameData['correctAnswer'] = isPrime($number);
        return $gameData;
    };
    runGame($gameDescription, $getGameData);
}

function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }
    for ($x = 2; $x <= sqrt($number); $x++) {
        if ($number % $x == 0) {
            return false;
        }
    }
    return true;
}
