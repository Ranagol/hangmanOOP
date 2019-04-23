<!DOCTYPE html>
<html>
<head>
	<title>HangmanOOP</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h2>HangmanOOP</h2>

<?php
	//----------------------------------
	$word = new WordGenerator;//this will give us one word
	var_dump($word->startWordGenerator());//this will echo the word
	$_SESSION['word'] = $word;





	//----------------------------------

	
	$object = new GuessHandler;
	$letter = $object->userGuessSimulation();//this will give us one random letter, which is simulating the user guess
	echo '<br>' . $letter . '<br>';
	$object->findLetterInWord($word, $letter);//this is deciding if the guess was correct or not, also creates an array of letters for the correct guesses and for the wrong guesses

	$end = new EndOfGame;//this will empty all the arrays...
?>


</body>
</html>