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





?>