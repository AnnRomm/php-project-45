<?php

namespace BrainGames\src\Game\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function calculateGcd($number1, $number2)
{
    while ($number2 != 0) { // Пока b не равно 0
        $temp = $number2;         // Сохраняем значение b во временную переменную
        $number2 = $number1 % $number2;       // Присваиваем b остаток от деления a на b
        $number1 = $temp;         // Присваиваем a значение переменной temp (старое значение b)
    }
        return $number1;              // Возвращаем значение a, это и есть НОД

}

    function playGcd()
    {
        $questionsAndAnswers = [];
        for ($i = 0; $i < ROUNDS_COUNT; $i++) {
            $number1 = rand(1, 20);
            $number2 = rand(1, 20);

            $question = "$number1  $number2";
            $rightAnswer = calculateGcd($number1, $number2);
            $questionsAndAnswers[$question] = $rightAnswer;
        }

        goPlay($questionsAndAnswers, \BrainGames\src\Game\Gcd\CONDITION);
    }