<?php

class GuessHandler{

	public $letters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

	public function userGuessSimulation(){
		$oneLetter = $this->letters[array_rand($this->letters)];
		return $oneLetter;
	}

	public function findLetterInWord($word, $letter){
		foreach ($word as $key => $value) {
			if ($value == $letter) {
				echo "Your guess is correct.";
				$_SESSION['allCorrectGuesses'][] = $letter;
				var_dump($_SESSION['allCorrectGuesses']);
			} else {
				echo "Your guess is wrong";
				$_SESSION['allCorrectGuesses'][] = $letter;
				var_dump($_SESSION['allCorrectGuesses']);
			}
		}
	}





}




?>