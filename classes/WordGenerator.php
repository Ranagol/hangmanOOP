<?php

class WordGenerator{//this class will open a txt file, create an array from words, and choose randomly one word

	public $txtFilePath = 'words2.txt';

	public $noWordYet = false;



	//--------------------------------------------
	public function thisWasAlreadyDone(){
		$this->noWordYet = true;
	}


	//-------------------------------------


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
		$this->thisWasAlreadyDone();
		$a = $this->readFile();
		$b = $this->selectWord($a);
		$c = $this->lettersFromWord($b);
		return $c;//this is an array!!
		
	}

}

$word = new WordGenerator;//this will give us one word
var_dump($word->startWordGenerator());//this will echo the word


?>


