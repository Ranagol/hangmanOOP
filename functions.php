<?php

function arrayCreator($variable){
	$letters = str_split($variable);
	return $letters;
}

function disableButton($letterGuess){
	switch ($letterGuess) {
		case 'value':
			# code...
			break;
		
		default:
			# code...
			break;
	}
	echo "disable";
}

function showLettersFromArray($someArray){
	foreach ($someArray as $key => $value) {
		echo ' ' . $value . ',';
	}
}


?>