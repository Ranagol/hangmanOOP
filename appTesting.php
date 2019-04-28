<?php

echo "<br>Below is the POST vardump<br>";
var_dump($_POST);

echo "<br>Below is the SESSIONvardump<br>";
var_dump($_SESSION);

echo "THIS IS THE WORD: " . $staticWord  . "<br>";
echo "<br>Below is the result of the SESSION-WORDS <br>";
var_dump($_SESSION['words']);

echo "<br>" . "Below is the result of the checkingTheGuess for the letter: " . $letterGuess . " and for the word " . $staticWord . "<br>";
var_dump($checkingTheGuess);

echo "<br>Below is the result of the vardump correctGuess <br>";
var_dump($_SESSION['correctGuess']);

echo "<br>Below is the result of the vardump SESSION at the end of the cycle<br>";
var_dump($_SESSION);

?>