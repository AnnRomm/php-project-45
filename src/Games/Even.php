<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 === 0;
}

function startGameIsEven()
{
    $questionsAndAnswers = [];
    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $randomNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = isEven($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[$randomNumber] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
