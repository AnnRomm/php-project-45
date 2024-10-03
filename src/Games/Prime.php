<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\goPlay;
use function BrainGames\Engine\randomNumberInRange;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number)
{
    $divisors = 0;
    for ($j = 1; $j <= $number; $j++) {
        if (($number % $j) === 0) {
            $divisors += 1;
        }
    }
    return $divisors === 2;
}

function startGamePrime()
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $randomNumber = randomNumberInRange(1, 100);
        $rightAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[(string)$randomNumber] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
