<?php

namespace BrainGames\src\Game\Gcd;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function calculateGcd($number1, $number2)
{
    while ($number2 != 0) {
        $temp = $number2;
        $number2 = $number1 % $number2;
        $number1 = $temp;
    }
    return $number1;
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