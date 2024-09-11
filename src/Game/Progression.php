<?php

namespace BrainGames\src\Game\Progression;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What number is missing in the progression?';

function generateProgression(int $start, int $step, int $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function startGameProgression()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = rand(1, 20);
        $step = rand(1, 10);
        $length = rand(5, 10);

        $progression = generateProgression($start, $step, $length);

        $hiddenIndex = rand(0, $length - 1);
        $rightAnswer = $progression[$hiddenIndex];

        $progression[$hiddenIndex] = '..';

        $question = implode(' ', $progression);

        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
