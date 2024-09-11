<?php

namespace BrainGames\src\Game\Prime;

use function BrainGames\Engine\goPlay;

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
    if ($divisors === 2) {
        return true;
    } else {
        return false;
    }
}

function startGamePrime()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 100);
        $rightAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[(string)$randomNumber] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
