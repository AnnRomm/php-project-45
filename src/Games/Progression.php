<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\goPlay;
use function BrainGames\Engine\randomNumberInRange;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What number is missing in the progression?';

function startGameProgression()
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $start = randomNumberInRange(1, 20);
        $step = randomNumberInRange(1, 10);
        $length = randomNumberInRange(5, 10);

        $progression = range($start, $start + ($length - 1) * $step, $step);

        $hiddenIndex = rand(0, $length - 1);
        $rightAnswer = $progression[$hiddenIndex];

        $progression[$hiddenIndex] = '..';

        $question = implode(' ', $progression);

        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
