<?php

namespace BrainGames\engine;

use function cli\{line, prompt};

const ROUNDS = 3;

function runGame(string $gameDescription, callable $getGameData)
{
    $name = welcome($gameDescription);
    for ($i = 0; $i < ROUNDS; $i++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $getGameData();
        line("Question: {$question}");
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            bue($answer, $correctAnswer, $name);
        }
    }
    congratulationsTo($name);
}

function welcome(string $gameDescription)
{
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line();
    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);
    line();
    return $name;
}

function bue(string $answer, string $rightAnswer, string $name)
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
    line("Let's try again, {$name}!");
    die();
}

function congratulationsTo(string $name)
{
    line("Congratulations, {$name}!");
}
