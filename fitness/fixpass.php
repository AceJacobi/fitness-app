<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Body</title>
    
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>
    
    
    
    
<body class="fixp-body">


<?php
    
    
    require_once 'log.php';
    require_once 'functions.php';

    
if(isset($_GET['coder'])){

    $check = sanitizeStrings($_GET['coder']);
    
    if(isset($_GET['emailer'])){
    
    $email = sanitizeStrings($_GET['emailer']);
    
    
    $query = "SELECT * from once where email='$email'";
    
    $result = $conn->query($query);
    
    
    if($result->num_rows){
        
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        $checkC = $row['onepass'];
        
        if($check === $checkC){
            
            echo "Good!";
            
            echo <<<_STAR
            <script>
            window.location = './secha.php?ema=$email&d=y';
            </script>
            
            _STAR;
            
        }
    }
        else {
            die("Sorry contact support!");
        }
        
        
        
    } else if(isset($_POST['umail'])){
        
        $email = $_POST['umail'];
        
        $query = "Select * from buddies where email='$email'";
        
        $result = $conn->query($query);
        
        if($result){
            
            //make a one-time code and email paring database after checking to see if they verified email.
            
            $query = "SELECT * from verify where email='$email'";
            $result = $conn->query($query);
            
            if($result->num_rows >= 1){
                die("You cannot change password because you did not verify email. Contact support or verify email in order to proceed.");
            }
            else {
            
            
            $saveCode = getRanVerify2();
            
            $query = "INSERT into once values('$email', '$saveCode')";
            
            $result = $conn->query($query);
            
            if($result){
                
                
                $to = "$email"; 
                $subject = "One-Time Reset";
                
                $message = "Hello User, "."\n"."Click on link to change your password: ";
                $messageL = " www.goldeyworld.com/fitness/fixpass.php?coder=$saveCode&emailer=$email ";
                
                $message2 = " No clickable link? Copy address into url. \n"; 
                
                $message3 = $message.$messageL.$message2;
                
                $headers[] = 'From: Body Buddy Support <buddysupport@goldeyworld.com>';
                
                
                $checker = mail($to, $message3, implode("\r\n", $headers)); 
                                
                if($checker){
                
                
                echo "Your one-time code has been sent. Go to your email and follow the instructions."."<br>";
                    
                echo <<<_SEND
                <a href='./index.php' target='_self'>Login</a>    
                _SEND;
                
                
                }else {
                    die("Error sending email!");
                }
            }
                   
            }
                
            }
            else {
                echo "Sorry, you must contact support to assist with this issue.";
             
        }
    }
        else{
            die("Error.");
        } 
    
    }
    else{

echo "<h1 class='reset-chead'>Get Reset Passcode</h1>";

echo <<<_END
<p class='reset-ptext'>Enter your email to recieve a one-time reset code.</p>
<form class='forgot-pass-form' action='./fixpass.php?coder=one' method='post' target='_self'>
<input type=email placeholder='Email' required name='umail'>
<input id='code-subB' type='submit' value='Send'>
</form>


_END;
    }
    

?>
    
    </body>
    
</html>