<?php

namespace BrainGames\src\Game\Even;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function startGameIsEven()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber = rand(1, 100);
        $rightAnswer = isEven($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[$randomNumber] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
