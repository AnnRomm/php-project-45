<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\goPlay;

const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function calculateGcd(int $number1, int $number2)
{
    while ($number2 !== 0) {
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
        $randomNumber1 = rand(MIN_NUMBER, MAX_NUMBER);
        $randomNumber2 = rand(MIN_NUMBER, MAX_NUMBER);

        $question = "$randomNumber1 $randomNumber2";
        $rightAnswer = calculateGcd($randomNumber1, $randomNumber2);
        $questionsAndAnswers[] = [ 'question' => $question, 'rightAnswer' => (string)$rightAnswer];
    }

    goPlay($questionsAndAnswers, CONDITION);
}
