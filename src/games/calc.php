<?php

namespace BrainGames\games\calc;

use function BrainGames\engine\runGame;

const MATH_SIGNS = ['+', '-', '*'];

function run()
{
    $gameDescription = 'What is the result of the expression?';
    $getGameData = function () {
        $gameData = [];
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $randomMathSign = MATH_SIGNS[array_rand(MATH_SIGNS)];
        $question = "{$firstNumber} {$randomMathSign} {$secondNumber}";
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = calculate($firstNumber, $randomMathSign, $secondNumber);
        return $gameData;
    };
    runGame($gameDescription, $getGameData);
}

function calculate(int $firstNumber, string $mathSign, int $secondNumber)
{
    switch ($mathSign) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
    }
}
