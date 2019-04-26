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
	$length = strlen($staticWord);
	echo $length  . '<br>';
	$mask = str_pad('', $length, '*');
	echo $mask . '<br>';//***********
	for($i = 0; $i < $length; $i++) {
	    if($staticWord[$i] === $letterGuess) {
	        $mask[$i] = $letterGuess;
	    }
	}
	echo $mask . '<br>'; // **ll

} else {
	$feedback = " not correct!";
	$_SESSION['wrongGuess'][] = $letterGuess;//add this letter to this array
}










//new EndOfGame;

require 'index.view.php';





/* THE OLD WAY
if (isset($_SESSION['correctGuess'])) {//if this array exists, then continue with the work
	$noDuplicates = array_unique($_SESSION['correctGuess']);//taking out all the possible duplicate values that could have been created by mistake or during refresh

	//display all guessed letters, * for all not guessed letters
	$displayThis=[];
	$string = 0;//this will be the final display hopefully
	foreach ($letters as $keyLetters => $valueLetters) {//all letters of the WORD
		foreach ($noDuplicates as $keySession => $valueSession) {//correct guess LETTER
			if ($valueLetters == $valueSession) {//in case of match...
				//echo $valueLetters;
				if (!strpos($string, $valueLetters)) {//if the letter is not already in the string, then add to the string
					$string .= $valueLetters;
					$displayThis[]= $valueLetters;
					echo '<br>' . $string . '<br>';
				}
				
			} else {//if there is no match
				//$keyLetters = ' * ';
				//echo $keyLetters;
				$displayThis[]= $keyLetters;
				$string .= $keyLetters;
			}
			
		}
	}
	
	
	echo '<br> This is it ' . $string;
	

}
*/
?>