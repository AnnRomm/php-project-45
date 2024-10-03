<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\goPlay;
use function BrainGames\Engine\randomNumberInRange;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 === 0;
}

function startGameIsEven()
{
    $questionsAndAnswers = [];
    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $randomNumber = randomNumberInRange(1, 100);
        $rightAnswer = isEven($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[$randomNumber] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
