<?php

namespace BrainGames\src\Game\Even;

use function cli\line;
use function cli\prompt;

function isEven($number)
{
    return $number % 2 === 0;
}

function Even()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    for ($i = 0; $i < $roundsToWin; $i++) {
        $number = rand(1, 100);
        line("Question: {$number}");
        $answer = prompt('Your answer');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

// Проверка на корректность ввода и сравнение с правильным ответом
        if ($answer !== 'yes' && $answer !== 'no') {
            line("'{$answer}' is not a valid answer ;(. The correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }

        if ($answer === $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}