<?php

class InitialMask{

    public function initialMaskCreate($length){
        //echo "firstMaskCreated noooooooooooot FOUND"  . '<br>';
        $mask = str_pad('', $length, '*');//this will create the FIRST mask ***********
        //echo $mask . '<br>';
        $_SESSION['mask'][] = 'firstMaskCreated';//this is how we 'memorize' the sign that the first mask was created
        $_SESSION['mask'][] = $mask;//this is how we 'memorize' the actual first mask, which is full of ******** and nothing else. We need the first letter here.
        return $mask;
    }
}



?>
