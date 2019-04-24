<?php

function arrayCreator($variable){
	$letters = str_split($variable);
	return $letters;
}


function showLettersFromArray($someArray){
	foreach ($someArray as $key => $value) {
		echo ' ' . $value . ',';
	}
}


function displayMisteryWord($letters){
	foreach ($letters as $key => $value) {
		$key = '  *  ';
		echo $key;
	}
}


?>