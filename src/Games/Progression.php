<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const START_MIN = 1;
const START_MAX = 20;
const STEP_MIN = 1;
const STEP_MAX = 10;
const LENGTH_MIN = 5;
const LENGTH_MAX = 10;

const CONDITION = 'What number is missing in the progression?';

function startGameProgression()
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $start = rand(START_MIN, START_MAX);
        $step = rand(STEP_MIN, STEP_MAX);
        $length = rand(LENGTH_MIN, LENGTH_MAX);

        $progression = range($start, $start + ($length - 1) * $step, $step);

        $hiddenIndex = rand(0, $length - 1);
        $rightAnswer = $progression[$hiddenIndex];

        $progression[$hiddenIndex] = '..';

        $question = implode(' ', $progression);

        $questionsAndAnswers[] = ['question' => $question, 'rightAnswer' => (string)$rightAnswer];
    }

    goPlay($questionsAndAnswers, CONDITION);
}
