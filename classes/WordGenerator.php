<?php

class WordGenerator{//this class will open a txt file, create an array from words, and choose randomly one word

	public $txtFilePath = 'classes/words2.txt';
	
	public function readFile(){
		$fileOpened =fopen( $this->txtFilePath, 'r');
		$fileWasRead = fread($fileOpened, filesize($this->txtFilePath));//this is a string wit lot of words
		return $fileWasRead;
		fclose($fileOpened);
	}

	public function selectWord($fileWasRead){
		$arrayCreated = explode(" ", $fileWasRead);//this is an array with lot of words
		$oneWordOnly =  $arrayCreated[array_rand($arrayCreated)];//this has a random value(random word) from the array, in array. This variable has one choosen word now.
		return $oneWordOnly;
	}

	public function lettersFromWord($oneWordOnly){
		$wordLetters = str_split($oneWordOnly);
		return $wordLetters;
	}

	public function startWordGenerator(){
		$a = $this->readFile();
		$b = $this->selectWord($a);
		$c = $this->lettersFromWord($b);
		return $c;//this is an array!!
	}


}

$object = new WordGenerator;
var_dump($object->startWordGenerator());//this will give us an array, containing all the letters of a random word



