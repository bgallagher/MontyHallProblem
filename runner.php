<?php
require_once 'MontyHallProblem.php';

$gameToPlays = 10000;
$correctGuesses = 0;

for($i = 0; $i < $gameToPlays; $i++) {

    $mHGame = new MontyHallProblem(3);
    $mHGame->selectBox();
    $mHGame->removeEmptyBoxesBarOne();

    //$mHGame->swapBoxSelection();

    if($mHGame->check()) {
        $correctGuesses++;
    }

}

echo "\n\r";
echo (($correctGuesses / $gameToPlays) * 100) . "% of guesses were correct \n\r";
echo "\n\r";