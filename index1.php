<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}




$wordgenerator = new WordGenerator;
$word = $wordgenerator->startWordGenerator();//this will give us one random word
$_SESSION['words'][] = $word;//which will be stored in session as the value of the first key
$staticWord = $_SESSION['words'][0];//...now we just save this to a variable... and we finally have a fix word!
echo $staticWord;//...which is echoed here

$a = new DisplayWord($staticWord);
var_dump($a);




require 'index.view.php';


?>