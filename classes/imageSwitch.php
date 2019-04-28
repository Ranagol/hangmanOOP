<?php

class ImageSwitch{

    public function chooseImage($wrongGuesses){
        switch ($wrongGuesses) {
            case '1':
            $imageDisplay = 'images/Hangman-1.png';
            break;
        
            case '2':
            $imageDisplay = 'images/Hangman-2.png';
            break;
    
            case '3':
            $imageDisplay = 'images/Hangman-3.png';
            break;
            
            case '4':
            $imageDisplay = 'images/Hangman-4.png';
            break;
            
            case '5':
            $imageDisplay = 'images/Hangman-5.png';
            break;
    
            case '6':
            $imageDisplay = 'images/Hangman-6.png';
            break;
        }
        return $imageDisplay;
    }
}


?>