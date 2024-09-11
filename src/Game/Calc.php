<?php

namespace BrainGames\src\Game\Calc;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What is the result of the expression?';

function calculate(int $randomNumber1, int $randomNumber2, string $operators)
{
    $result = null;

    switch ($operators) {
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
            echo "Error: Unknown operator '$operators'.";
            break;
    }

    return $result;
}


function startGameCalculator()
{
    $operators = array('+', '-', '*');
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomNumber1 = rand(1, 20);
        $randomNumber2 = rand(1, 20);
        $operator = $operators[array_rand($operators)];

        $question = "$randomNumber1 $operator $randomNumber2";
        $rightAnswer = calculate($randomNumber1, $randomNumber2, $operator);
        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}
