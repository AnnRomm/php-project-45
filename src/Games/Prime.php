<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

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
        $randomNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[] = [ 'question' => $randomNumber, 'rightAnswer' => $rightAnswer];
    }

    goPlay($questionsAndAnswers, CONDITION);
}
