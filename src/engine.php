<?php

namespace BrainGames\engine;

use function cli\{line, prompt};

const ROUNDS = 3;

function runGame(string $gameDescription, callable $getGameData)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line();
    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);
    line();
    for ($i = 0; $i < ROUNDS; $i++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $getGameData();
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            die();
        }
    }
    line("Congratulations, $name!");
}
