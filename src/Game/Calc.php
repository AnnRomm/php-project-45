<?php

namespace BrainGames\src\Game\Calc;

use function BrainGames\Engine\goPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What is the result of the expression?';

function calculate($number1, $number2, $operators)
{
    switch ($operators) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function gameCalculatorStart()
{
    $operators = array('+', '-', '*');
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number1 = rand(1, 20);
        $number2 = rand(1, 20);
        $operator = $operators[array_rand($operators)];

        $question = "$number1 $operator $number2";
        $rightAnswer = calculate($number1, $number2, $operator);
        $questionsAndAnswers[$question] = $rightAnswer;
    }

    goPlay($questionsAndAnswers, CONDITION);
}






