<?php

class AddLetterToMask{

    public function createNewMask($length, $staticWord, $letterGuess){
        $mask = end($_SESSION['mask']);//we 'remember' the last mask
		//echo "Adding letter to the initial mask"  . '<br>';
		for($i = 0; $i < $length; $i++) {
			if($staticWord[$i] === $letterGuess) {
				$mask[$i] = $letterGuess;//we add the new letter to the last mask
			}
		}
		//echo $mask . '<br>'; // **ll
		$_SESSION['mask'][] = $mask;//we 'memorize' this last mask, so it can be used the next time to add more letters
    }
}


?>