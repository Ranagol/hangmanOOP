<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

require 'functions.php';

if (isset($_POST)) {
	$letterGuess = $_POST['letterGuess'];//this is the users current guess
	//var_dump($_POST);
	//echo $letterGuess . '<br>';
}


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


if (isset($checkingTheGuess[0])) {//if there is a key found...
	$feedback = " correct!";
	$_SESSION['correctGuess'][] = $letterGuess;//add this letter to this array
} else {
	$feedback = " not correct!";
	$_SESSION['wrongGuess'][] = $letterGuess;//add this letter to this array
}

/*
echo "<br>Below is the array of correctGuess <br>";
var_dump($_SESSION['correctGuess']);
echo "<br>Below is the array of wrongGuess <br>";
var_dump($_SESSION['wrongGuess']);
*/

$session = $_SESSION['correctGuess'];
foreach ($letters as $keyLetters => $valueLetters) {
	foreach ($session as $keySession => $valueSession) {
		if ($valueLetters == $valueSession) {
			echo $valueLetters;
		} else {
			$keyLetters = ' * ';
			echo $keyLetters;
		}
	}
	

}




//new EndOfGame;

require 'index.view.php';


?>