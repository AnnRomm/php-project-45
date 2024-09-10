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

function playGameGcd()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber1 = rand(1, 20);
        $randomNumber2 = rand(1, 20);

        $question = "$randomNumber1 $randomNumber2";
        $rightAnswer = calculateGcd($randomNumber1, $randomNumber2);
        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, \BrainGames\src\Game\Gcd\CONDITION);
}
