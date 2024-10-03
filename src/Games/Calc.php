<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\goPlay;
use function BrainGames\Engine\randomNumberInRange;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What is the result of the expression?';

function calculate(int $randomNumber1, int $randomNumber2, string $operator)
{
    switch ($operator) {
        case '+':
            $result = $randomNumber1 + $randomNumber2;
            break;
        case '-':
            $result = $randomNumber1 - $randomNumber2;
            break;
        case '*':
            $result = $randomNumber1 * $randomNumber2;
            break;
        default:
            echo "Error: Unknown operator '$operator'.";
            exit(1);
    }

    return $result;
}


function startGameCalculator()
{
    $operators = array('+', '-', '*');
    $questionsAndAnswers = [];

    for ($round = 1; $round <= ROUNDS_COUNT; $round++) {
        $randomNumber1 = randomNumberInRange(1, 20);
        $randomNumber2 = randomNumberInRange(1, 20);
        $operator = $operators[array_rand($operators)];

        $question = "$randomNumber1 $operator $randomNumber2";
        $rightAnswer = calculate($randomNumber1, $randomNumber2, $operator);
        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
