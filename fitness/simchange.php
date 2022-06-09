<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Body</title>    
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>
    
<body class="sim-bodyD">


<?php

session_start();
    
require_once 'log.php';
    
require_once 'functions.php';

if(isset($_GET['grab'])){
    
    if(isset($_SESSION['cemail'])){
        
        $email = sanitizeStrings($_SESSION['cemail']);
        
        echo <<<_START
        
            <div class='sim-change-div'>
            
                <h1>Change Your Password</h1>
                
                <form class='ez-cform' method='post' target='_self' action='simchange.php'>
                
                    <input name='npass' type=password placeholder='New Password' maxlength=12 required>
                    
                    <input name='npass2' type=password placeholder='Reenter Password' maxlength=12 required>
                    
                    <input name='uemail' type=hidden value='$email'>
                    
                    <input id='ex-formB' type='submit' value='Submit'>  
                    
                </form>
                
            </div>
            
        _START;
        
    }
    else {
        
        die('Must log in to view page!');
        
    }
        
}
elseif (isset($_POST['npass'])){
    
    $np = sanitizeStrings($_POST['npass']);    
    
    $show = $_POST['uemail'];        
    
    $query = "UPDATE" {yourtablename} "set pass='$np' where email='$show'";    
    
    $result = $conn->query($query);
        
    if($result){
        
        echo "Complete! Sign in again!";
        
        echo <<<_MAIN
        
            <script>
            
                window.location = './index.php';
                
            </script>
            
        _MAIN;
        
    }
    else {
        
        echo "Something went wrong!";
        
    }
    
    
}

else {
    die('No access to page!');
}



?>
        
        
    </body>
</html>
