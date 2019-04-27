<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

require 'functions.php';


//USERS GUESS
if (isset($_POST['letterGuess'])) {
	$letterGuess = $_POST['letterGuess'];//this is the users current guess
}

//RESET BUTTON
if (isset($_POST['Reset'])) {
	$reset = $_POST['Reset'];
	echo "Reset started";
	$end = new EndOfGame;
	unset($end);
} else {
	echo "No reset process, continue with the game";
}

echo "<br>Below is the POST vardump<br>";
var_dump($_POST);

echo "---------------------------------------";
echo "<br>Below is the SESSIONvardump<br>";

var_dump($_SESSION);

echo "---------------------------------------";




//RANDOM WORD
if (!isset($_SESSION['words'])) {
	echo "WORD IS NOT SET YET (this is the first step)" . "<br>";
	$wordgenerator = new WordGenerator;
	$staticWord = $wordgenerator->startWordGenerator();//somehow this is a string now. This is our random word.
	$_SESSION['words'] = $staticWord;//which will be stored in session as the value of the first key
	unset($wordgenerator);
} else {
	echo "WORD is set(this is the second step)" . "<br>";
	$staticWord = $_SESSION['words'];
}




echo "THIS IS THE WORD: " . $staticWord  . "<br>";
echo "<br>Below is the result of the SESSION-WORDS <br>";
var_dump($_SESSION['words']);


//CREATING ARRAY FROM WORD
$letters = arrayCreator($staticWord);//we splitted the fix word to an array of letters below

//CHECKING IF THE WORD CONTAINS THE GUESS
if (isset($_POST['letterGuess'])) {
	$checkingTheGuess = array_keys($letters,$letterGuess, 'strict');//this returns the values key, if it found the values
	echo "<br>" . "Below is the result of the checkingTheGuess for the letter: " . $letterGuess . " and for the word " . $staticWord . "<br>";
	var_dump($checkingTheGuess);
}


$showMisteryWord = 0;

//IS THERE A MATCH?
if (!empty($checkingTheGuess)) {//if there is a key found...
	$feedback = " correct!";
	$_SESSION['correctGuess'][] = $letterGuess;//add this letter to the correct array
	echo "<br>Below is the result of the vardump correctGuess <br>";
	var_dump($_SESSION['correctGuess']);
	$length = strlen($staticWord);
	//echo "<br>Below is the " . $_SESSION['mask'] . "<br>";
	
	//MASK CREATING
	// if this is the first cycle, and no mask was created
	if (array_search('firstMaskCreated', $_SESSION['mask']) !==0) {
		echo "firstMaskCreated noooooooooooot FOUND"  . '<br>';
		$mask = str_pad('', $length, '*');//this will create the FIRST mask ***********
		echo $mask . '<br>';
		$_SESSION['mask'][] = 'firstMaskCreated';//this is how we 'memorize' that the sign that the first mask was created
		$_SESSION['mask'][] = $mask;//this is how we 'memorize' the actual first mask, which is full of ******** and nothing else. We need the first letter here.
//-----------CRITICAL PART		
		for($i = 0; $i < $length; $i++) {
		    if($staticWord[$i] === $letterGuess) {
		        $mask[$i] = $letterGuess;//we add the new letter to the last mask
		    }
		}
		echo $mask . '<br>'; // **ll
		$_SESSION['mask'][] = $mask;//we 'memorize' the last mask, so it can be used the next time to add more letters
//-----------------------------


		$showMisteryWord = 1;
	} else {//if this is NOT the first cycle, and there is a mask created
		echo "firstMaskCreated FOUND"  . '<br>';
		$mask = end($_SESSION['mask']);//we 'remember' the last mask
		for($i = 0; $i < $length; $i++) {
		    if($staticWord[$i] === $letterGuess) {
		        $mask[$i] = $letterGuess;//we add the new letter to the last mask
		    }
		}
		echo $mask . '<br>'; // **ll
		$_SESSION['mask'][] = $mask;//we 'memorize' the last mask, so it can be used the next time to add more letters
		$showMisteryWord = 2;
	}	

} else {//when wrong letter was submitted, then...
	$feedback = " not correct!";
	if (isset($_POST['letterGuess'])) {
		$_SESSION['wrongGuess'][] = $letterGuess;//add this letter to this array
	}
}




echo "<br>Below is the result of the vardump SESSION<br>";
var_dump($_SESSION);
require 'index.view.php';

?>