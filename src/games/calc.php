<?php

namespace BrainGames\games\calc;

use function cli\{line, prompt};
use function BrainGames\Cli\{welcome, bue, congratulationsTo};

use const BrainGames\Cli\ROUNDS;

const MATH_SIGNS = ['+', '-', '*'];

function run()
{
    $name = welcome('What is the result of the expression?');
    $counter = 0;
    while ($counter < ROUNDS) {
        $parameters = generateQuestion();
        $question = implode(' ', $parameters);
        line("Question: {$question}");
        $check = prompt("Your answer");
        $return = checkCalculation($parameters, $check, $name);
        if (! $return) {
            break;
        }
        $counter++;
    }
    if ($counter === ROUNDS) {
        congratulationsTo($name);
    }
}

function generateQuestion()
{
    $firstNumber = rand(1, 50);
    $secondNumber = rand(1, 50);
    $randomMathSign = MATH_SIGNS[array_rand(MATH_SIGNS)];
    return [$firstNumber, $randomMathSign, $secondNumber];
}

function checkCalculation(array $expression, string $answer, string $name)
{
    $result = true;
    $rightAnswer = (string) calculate($expression);
    if ($answer !== $rightAnswer) {
        bue($answer, $rightAnswer, $name);
        $result = false;
    } else {
        line('Correct!');
    }
    return $result;
}

function calculate(array $parameters)
{
    $answer = '';
    [$firstNumber, $mathSign, $secondNumber] = $parameters;
    switch ($mathSign) {
        case '+':
            return $answer = $firstNumber + $secondNumber;
        case '-':
            return $answer = $firstNumber - $secondNumber;
        case '*':
            return $answer = $firstNumber * $secondNumber;
    }
    return $answer;
}
