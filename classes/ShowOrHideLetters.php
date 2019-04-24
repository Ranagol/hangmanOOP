<?php

class ShowOrHideLetters{

	


	public function __construct(){

	}


	public function displayMisteryWord($letters){
		foreach ($letters as $key => $value) {
			$key = '  *  ';
			echo $key;
		}
	}
}




?>