<!DOCTYPE html>
<html>
<head>
	<title>HangmanOOP</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h2>HangmanOOP</h2>

<?php

	$word = new WordGenerator;//this will give us one word
	$object = new GuessHandler;
	$letter = $object->userGuessSimulation();//this will give us one random letter, which is simulating the user guess
	echo $letter;
	$object->findLetterInWord($word, $letter);//this is deciding if the guess was correct or not, also creates an array of letters for the correct guesses and for the wrong guesses
?>


</body>
</html>