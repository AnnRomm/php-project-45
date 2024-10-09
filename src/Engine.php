<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function goPlay(array $questionsAndAnswers, string $condition)
{
    line('Welcome to the Brain Games!');
    $namePlayer = prompt('May I have your name?');
    line("Hello, {$namePlayer}");
    line($condition);

    foreach ($questionsAndAnswers as $question => $rightAnswer) {
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer === (string)$rightAnswer) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
