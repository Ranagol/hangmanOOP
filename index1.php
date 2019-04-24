<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

require 'functions.php';

if (isset($_POST)) {
	$letterGuess = $_POST['letterGuess'];//this is the users current guess
	echo $letterGuess . '<br>';
}


$wordgenerator = new WordGenerator;
$word = $wordgenerator->startWordGenerator();//this will give us one random word
$_SESSION['words'][] = $word;//which will be stored in session as the value of the first key
$staticWord = $_SESSION['words'][0];//...now we just save this to a variable... and we finally have a fix word!
echo $staticWord;//...which is echoed here

$letters = arrayCreator($staticWord);//we splitted the fix word to an array of letters
var_dump($letters);

$searching = array_keys($letters,$letterGuess, 'strict');

if (isset($searching[0])) {
	echo "Correct";
} else {
	echo "Not correct";
}

var_dump($searching);



require 'index.view.php';


?>