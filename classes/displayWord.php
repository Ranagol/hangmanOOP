<?php

class DisplayWord{//you need and argument for instantiation!

	public $staticWord;

	public function __construct($staticWord){
		$this->staticWord = $staticWord;
		$this->lettersFromWord($this->staticWord);
	}

	public function lettersFromWord($staticWord){
		$lettersInArray = str_split($staticWord);
		return $lettersInArray;
	}


}


?>