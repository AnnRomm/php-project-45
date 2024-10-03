<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\goPlay;
use function BrainGames\Engine\randomNumberInRange;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function calculateGcd(int $number1, int $number2)
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
    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $randomNumber1 = randomNumberInRange(1, 20);
        $randomNumber2 = randomNumberInRange(1, 20);

        $question = "$randomNumber1 $randomNumber2";
        $rightAnswer = calculateGcd($randomNumber1, $randomNumber2);
        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
