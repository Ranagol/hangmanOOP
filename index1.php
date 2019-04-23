<?php
session_start();

function __autoload($className) {
	$className = str_replace('..', '', $className);
	require("classes/$className.php");
}

$wordpicker = new Wordpicker();

require 'index.view.php';


?>