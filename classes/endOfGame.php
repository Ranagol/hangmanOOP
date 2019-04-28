<?php

class EndOfGame{

	public function __construct(){
		$this->emptySession();
	}

	public function emptySession(){
		session_unset();// remove all session variables
		//Below: create new word in case of reset
		$wordgenerator = new WordGenerator;
		$staticWord = $wordgenerator->startWordGenerator();//$staticWord is a string, don't forget
		$_SESSION['words'] = $staticWord;
		//echo "All session variables are now removed, and the session is destroyed.";
	}
	
	
}



?>