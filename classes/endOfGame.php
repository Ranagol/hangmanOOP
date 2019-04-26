<?php

class EndOfGame{

	public function __construct(){
		$this->emptySession();
	}

	public function emptySession(){
		session_unset();// remove all session variables
		session_destroy();// destroy the session
		echo "All session variables are now removed, and the session is destroyed. Now turn off the 'EndOfGame', save and refresh.";
	}
	
	
}



?>