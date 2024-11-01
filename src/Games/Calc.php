<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_NUMBER = 1;
const MAX_NUMBER = 20;

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
        $randomNumber1 = rand(MIN_NUMBER, MAX_NUMBER);
        $randomNumber2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operator = $operators[array_rand($operators)];

        $question = "$randomNumber1 $operator $randomNumber2";
        $rightAnswer = calculate($randomNumber1, $randomNumber2, $operator);
        $questionsAndAnswers[] = ['question' => $question, 'rightAnswer' => (string)$rightAnswer];
    }

    goPlay($questionsAndAnswers, CONDITION);
}
