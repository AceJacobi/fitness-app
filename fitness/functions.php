<?php

    
    function sanitizeStrings($string)
    {
        global $conn;

        $string = strip_tags($string);
        
        $string = htmlentities($string);
        
        $string = stripslashes($string);        

        return $conn-> real_escape_string($string);


    }

    function destroySession()
    {
        $_SESSION = array();
        
        session_destroy();
    }



    function getRanVerify(){
        
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        
        $nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
        
        $string = array();
        
        for($count = 0; $count < 3; ++$count){
            $string[$count] = randomPicker($letters);
        }
        
        for($count = 3; $count < 6; ++$count){
            $string[$count] = randomPicker($nums);
        }
        
        for($count = 6; $count < 9; ++$count){
            $string[$count] = randomPicker($letters);
        }
        
        for($count = 9; $count < 12; ++$count){
            $string[$count] = randomPicker($nums);
        }
        
        
        $newString = implode('', $string);
        
        return $newString;
        
    }




function getRanVerify2(){
    
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        
        $nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
        
        $string = array();
        
        for($count = 0; $count < 3; ++$count){
            $string[$count] = randomPicker($letters);
        }
        
        for($count = 3; $count < 6; ++$count){
            $string[$count] = randomPicker($nums);
        }
        
        for($count = 6; $count < 9; ++$count){
            $string[$count] = randomPicker($letters);
        }
        
        for($count = 9; $count < 12; ++$count){
            $string[$count] = randomPicker($nums);
        }
    
        for($count = 12; $count < 16; ++$count){
            $string[$count] = randomPicker($letters);
        }
        
        
        $newString = implode('', $string);
        
        return $newString;
        
    }






function randomPicker($arr){
    
    $len = count($arr);
    
    $x = mt_rand(0, $len-1);
    
    $choice = $arr[$x];
    
    return $choice;
}


?>
