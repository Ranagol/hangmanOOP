<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

require 'functions.php';



if (isset($_POST['letterGuess'])) {
	$letterGuess = $_POST['letterGuess'];//this is the users current guess
	//var_dump($_POST);
	//echo $letterGuess . '<br>';
} else {
	$letterGuess = '';
}

if (isset($_POST['Reset'])) {
	$reset = $_POST['Reset'];
	echo "Reset started";
	$end = new EndOfGame;
	unset($end);
} else {
	echo "No reset process, continue with the game";
}


var_dump($_POST);

$wordgenerator = new WordGenerator;
$word = $wordgenerator->startWordGenerator();//this will give us one random word
$_SESSION['words'][] = $word;//which will be stored in session as the value of the first key
$staticWord = $_SESSION['words'][0];//...now we just save this to a variable... and we finally have a fix word!
//echo $staticWord;//...which is echoed here

$letters = arrayCreator($staticWord);//we splitted the fix word to an array of letters below
//echo "<br>Below is the array of letters <br>";
//var_dump($letters);

$checkingTheGuess = array_keys($letters,$letterGuess, 'strict');//this returns the values key, if it found the values
//echo "<br>Below is the result of the checkingTheGuess <br>";
//var_dump($checkingTheGuess);

$showMisteryWord = 0;



if (isset($checkingTheGuess[0])) {//if there is a key found...
	$feedback = " correct!";
	$_SESSION['correctGuess'][] = $letterGuess;//add this letter to this array
	$length = strlen($staticWord);
	echo $length  . '<br>';
	

	if (array_search('firstMaskCreated', $_SESSION['mask']) !==0) {// if this is the first cycle, and no mask was created
		echo "firstMaskCreated noooooooooooot FOUND"  . '<br>';
		$mask = str_pad('', $length, '*');//this will create the FIRST mask ***********
		echo $mask . '<br>';
		$_SESSION['mask'][] = 'firstMaskCreated';//this is how we 'memorize' that the first mask was created
		$_SESSION['mask'][] = $mask;//this is how we 'memorize' the first mask
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

} else {
	$feedback = " not correct!";
	$_SESSION['wrongGuess'][] = $letterGuess;//add this letter to this array
}

require 'index.view.php';

?>