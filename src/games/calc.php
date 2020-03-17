<?php

namespace BrainGames\games\calc;

use function BrainGames\engine\runGame;

const MATH_SIGNS = ['+', '-', '*'];

function run()
{
    $gameDescription = 'What is the result of the expression?';
    $getGameData = function () {
        $logic = [];
        $parameters = generateQuestion();
        $question = implode(' ', $parameters);
        $logic['question'] = $question;
        $logic['correctAnswer'] = calculate($parameters);
        return $logic;
    };
    runGame($gameDescription, $getGameData);
}

function generateQuestion()
{
    $firstNumber = rand(1, 50);
    $secondNumber = rand(1, 50);
    $randomMathSign = MATH_SIGNS[array_rand(MATH_SIGNS)];
    return [$firstNumber, $randomMathSign, $secondNumber];
}

function calculate(array $parameters)
{
    [$firstNumber, $mathSign, $secondNumber] = $parameters;
    switch ($mathSign) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
    }
}
