<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

require 'functions.php';

//RESET BUTTON
if (isset($_POST['Reset'])) {//if the reset button is clicked, then...
	$reset = $_POST['Reset'];
	//echo "Reset started";
	$end = new Reset;
	
	unset($end);
} else {
	//echo "No reset process, continue with the game";
}

$winDisplay = 'hidden';
$looseDisplay = 'hidden';

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

//CREATING INITIAL MASK (***********) - if this is the first cycle, and no mask was created
if (array_search('firstMaskCreated', $_SESSION['mask']) !==0) {
	$mask = new InitialMask;
	$mask->initialMaskCreate($length);
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
	$_SESSION['correctGuess'][] = $letterGuess;//add this letter to the correct array	
	//ADD LETTER TO THE LAST VERSION OF THE MASK
	if (array_search('firstMaskCreated', $_SESSION['mask']) !==false) {
		//echo "firstMaskCreated FOUND"  . '<br>';
		$addLetter = new AddLetterToMask;
		$addLetter->createNewMask($length, $staticWord, $letterGuess);
		$showMisteryWord = 1;
	}
} else {//IF THERE IS NO MATCH, THEN DO THIS
	if (isset($_POST['letterGuess'])) {
		$_SESSION['wrongGuess'][] = $letterGuess;//add this wrong letter to the wrongGuess array
	}
}

//YOU WIN
$lastMask = end($_SESSION['mask']);
//echo $lastMask;
$misteryWord = $_SESSION['words'];
//echo $misteryWord;
if ($lastMask == $misteryWord) {
	//echo "Andor is genius";
	$winDisplay = '';
}

//YOU LOOSE
//SESSION-WRONG GUESS = 6
if (isset($_SESSION['wrongGuess'])) {
	$wrongGuesses = count($_SESSION['wrongGuess']);
	echo $wrongGuesses;
	if ($wrongGuesses == 6) {
		$looseDisplay = '';
	}
}





require 'index.view.php';

?>