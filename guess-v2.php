<?php

session_start();
define("MAXNUMBER", 100);

if (empty($_SESSION['guesses'])) {
    //Första gissningen
    $_SESSION['guesses'] = 0;
    $_SESSION['secretNumber'] = rand(1, MAXNUMBER);
}
//Assign secret number
$secretNumber = $_SESSION['secretNumber'];

//Get guess from user
//$guessedNumber = $_GET['guess'];
$guessedNumber = filter_input(INPUT_GET, 'guess');

//Increase number of guesses
$numberOfGuesses = ++$_SESSION['guesses'];

//Show results
echo "$numberOfGuesses\n <br />";
echo "$guessedNumber\n <br />";
echo "$secretNumber\n <br />"; //Only for debug
//check result
if ($guessedNumber > $secretNumber) {
    echo "Guessed number is too large\n <br />";
} else if ($guessedNumber < $secretNumber) {
    echo "Guessed number is too small\n <br />";
} else {
    echo "After $numberOfGuesses guesses your guess ($guessedNumber) is correct";

    //Prepare for restart
    //$_SESSION['guesses'] = 0;
    //$_SESSION['secretNumber'] = rand(1, MAXNUMBER);
    session_destroy();
}
 