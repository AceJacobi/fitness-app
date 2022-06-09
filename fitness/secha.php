<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Body</title>
    
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body class="se-body">
<?php

    require_once 'log.php';
    
    require_once 'functions.php';
        
    
if(isset($_GET['ema'])){
    
    $email = sanitizeStrings($_GET['ema']);
    
    if(isset($_GET['d'])){   
    
    $query = "SELECT * from" {yourtablename} "where email='$email'";
    
    $result = $conn->query($query);
    
    if($result->num_rows >= 1){   
    
        $query = "DELETE from" {yourtablename} "where email='$email'";

        $result = $conn->query($query);
    
        if($result){

            echo '';

            $query = "INSERT into" {yourtablename} "values('$email')";

            $result = $conn->query($query);

            if($result){
                
                echo '';
                
            }
            else {
                
                die('Contact support for password issue.');
                
            }
        }    
        else {
            
            die('Please contact support!');
            
        }
        }
        else {
            
            die('Page restricted!');
            
        }
    }
     
    
    
    $query = "SELECT * from" {yourtablename} "where email='$email'";
    
    $result = $conn->query($query);
    
    if($result->num_rows >= 1){
        
    echo <<<_END
        <div class='change-pform-div'> 
        
            <h1 id='change-pass-head'>Change Password</h1>
            
            <form class='change-pass-form'  action='secha.php?e=$email' method='post' onsubmit='samePass()'>
            
                <input name='passO' type=password maxlength=12 required placeholder='New Password'>
                
                <input name='passT' type=password maxlength=12 required placeholder='Reenter Password'>
                
                <input id='submit-changePB' type='submit' value='Reset Password'>
                
            <form>    
            
        </div>   
    _END;
        
        
        $query = "DELETE from" {yourtablename} "where email='$email'";
        
        $result = $conn->query($query);        
        
        if($result){
            
            echo "<br>"."<br>".'One time use code destroyed.';
            
        }
        else {
            
            die("Contact support!");
            
        }
        
        
    }
    else {
        
        die('Page already accessed!');
        
    }
}
    else {
        
        if(isset($_POST['passO'])){        
        
        $pass = $_POST['passT'];
                
        $email = sanitizeStrings($_GET['e']);
        
        $query = "select * from" {yourtablename} "where email='$email'";
        
        $result = $conn->query($query);        
        
        if($result){
            
            $query = "update" {yourtablename} "set pass='$pass' where email='$email'";
            
            $result = $conn->query($query);
            
            if($result){
                
                echo "Password successfully changed. Please sign in again."."<br>";
                
                echo "<a href='./index.php ' target='_self'>Login</a>";
                
            }
            else {
                
                die("Contact support to change password.");
                
            }
            
            
            
        }
        
        
    }else{
            
        die('This page not accessible!');
            
        }
    }   
   

?>
    <script src="script3.js" type="application/javascript"></script>
    
    </body>
    
</html>
