<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

require 'functions.php';

//RESET BUTTON
if (isset($_POST['Reset'])) {
	$reset = $_POST['Reset'];
	//echo "Reset started";
	$end = new EndOfGame;
	unset($end);
} else {
	//echo "No reset process, continue with the game";
}

//RANDOM WORD 
if (!isset($_SESSION['words'])) {
	//echo "We are using the WordGenerator for the random word(THIS IS THE FIRST STEP)" . "<br>";
	$wordgenerator = new WordGenerator;
	$staticWord = $wordgenerator->startWordGenerator();//$staticWord is a string, don't forget
	$_SESSION['words'] = $staticWord;
	unset($wordgenerator);
} else {
	//echo "We are taking out the word from the SESSION-WORDS(THIS IS THE SECOND STEP)" . "<br>";
	$staticWord = $_SESSION['words'];
}

$length = strlen($staticWord);//this is the length of the word

//CREATING INITIAL MASK (***********)
// if this is the first cycle, and no mask was created
if (array_search('firstMaskCreated', $_SESSION['mask']) !==0) {
	//echo "firstMaskCreated noooooooooooot FOUND"  . '<br>';
	$mask = str_pad('', $length, '*');//this will create the FIRST mask ***********
	echo $mask . '<br>';
	$_SESSION['mask'][] = 'firstMaskCreated';//this is how we 'memorize' the sign that the first mask was created
	$_SESSION['mask'][] = $mask;//this is how we 'memorize' the actual first mask, which is full of ******** and nothing else. We need the first letter here.
}

//CREATING ARRAY FROM WORD
$letters = arrayCreator($staticWord);//we splitted the fix word to an array of letters below

//CHECKING IF THE WORD CONTAINS THE GUESS
if (isset($_POST['letterGuess'])) {
	$letterGuess = $_POST['letterGuess'];//this is the users current guess--------------------------
	$checkingTheGuess = array_keys($letters,$letterGuess, 'strict');//this returns the values key, if it found the values
}

$showMisteryWord = 0;

//IF THERE IS A MATCH, THEN DO THIS
if (!empty($checkingTheGuess)) {//if there is a key found...
	$feedback = " correct!";
	$_SESSION['correctGuess'][] = $letterGuess;//add this letter to the correct array	
		
	//ADD LETTER TO THE LAST VERSION OF THE MASK
	if (array_search('firstMaskCreated', $_SESSION['mask']) !==false) {
		//echo "firstMaskCreated FOUND"  . '<br>';
		$mask = end($_SESSION['mask']);//we 'remember' the last mask
		//echo "Adding letter to the initial mask"  . '<br>';
		for($i = 0; $i < $length; $i++) {
			if($staticWord[$i] === $letterGuess) {
				$mask[$i] = $letterGuess;//we add the new letter to the last mask
			}
		}
		//echo $mask . '<br>'; // **ll
		$_SESSION['mask'][] = $mask;//we 'memorize' this last mask, so it can be used the next time to add more letters
		$showMisteryWord = 1;
	}
} else {//IF THERE IS NO MATCH, THEN DO THIS
	$feedback = " not correct!";
	if (isset($_POST['letterGuess'])) {
		$_SESSION['wrongGuess'][] = $letterGuess;//add this letter to this array
	}
}

require 'index.view.php';

?>