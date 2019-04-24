<?php

function arrayCreator($variable){
	$letters = str_split($variable);
	return $letters;
}

//ez nem jo mert mindegyik beture cselekszik, nem csak a keresett beture
function findLetterInWord($staticWord, $letterGuess){
	foreach ($staticWord as $key => $value) {
		if ($value == $letterGuess) {
			echo "Your guess is correct.";
			$_SESSION['allCorrectGuesses'][] = $letterGuess;
		} else {
			echo "Your guess is wrong";
			$_SESSION['allWrongGuesses'][] = $letterGuess;
		}
	}
	var_dump($_SESSION);

}



?>