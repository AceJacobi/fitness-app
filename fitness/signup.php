<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Body Buddy</title>
    
    
    <link href="./style.css" rel="stylesheet" type="text/css">
    <title>Sign Up</title>
</head>

<body class="signup-body">
    
    <h1 class="header-sign">Sign Up</h1>
    
    
    <p id="hide-text" class="info-text">Thank you for choosing a healthier lifestyle. Fill in the info below and you'll be ready to go!</p>
    

    <?php 

    require_once 'log.php';
    require_once 'functions.php';
    
    

    if(isset($_POST['fullname'])){
        
        $name = sanitizeStrings($_POST['fullname']);
        $username = sanitizeStrings($_POST['username']);
        $email = sanitizeStrings($_POST['emailfield']);
        $pass = sanitizeStrings($_POST['passfield']);
        
        $rVerify = $eRVerify = getRanVerify();
        
           
        $query = "INSERT INTO" {yourtablename} "VALUES('$name', '$username', '$email', '$pass', NULL)";
        
        $result = $conn->query($query);
        
        if(!$result){
            echo 'Sign up failed! Check your fields and retry.';
        }
        else {
            
            echo <<<_HIDE
            <script>
                function hideText(){
                    let text = document.getElementById('hide-text');
                    text.style.display = 'none';
                }
                hideText();
                
            </script>            
            
            _HIDE;
            
            $queryT = "INSERT into" {yourtablename} "values('$email', '$rVerify', 'no')";
            
            $resultT = $conn->query($queryT);
            
            if(!$resultT){
                echo 'Email verification failed. Please contact support.';
            }
            else{
                echo "<h3>Please Verify Email</h3>";
                
                
                $to = "$email"; 
                
                $message = "Hello User, "."\n"."Click link to verify your email!"."\n"."www.goldeyworld.com/fitness/verifye.php?vEK=$eRVerify&usere=$email"."\n"."No clickable link? Copy address into url."; 
                
                $headers[] = 'From: Body Buddy Support <support@goldeyworld.com>\r\n Subject: Verify Email';
                
                
                $checker = mail($to, $message, implode("\r\n", $headers)); 
                
                if($checker){
                    echo "Message sent to: $email.";
                }
                else {
                    echo 'Contact support for verification email!';
                }
                                    
        
            }
        
                                    
            echo "You're all signed up $name!"."<br>";        
            
            
            
            echo "Please sign in!"."<br>";
            echo "<a href='./index.php' target='_self'>Login</a>";
            
        }            
        
    }
    else{
        
    
    
    
echo <<<_END
    
    <form id="sign-up" class="form-format" action='signup.php' method='post' onsubmit="return verify()">
        <input id='fname' type='text' name='fullname' maxlength=20 placeholder='Full Name' required> 
        <input id='username-area' type='text' name='username' maxlength=12 placeholder='Username' required onBlur="loadDoc()"><span id="uname-check"></span> 
        <input id='efield' type='email' name='emailfield' maxlength=30 placeholder='Email' required> 
        <input id='pfield' type='password' name='passfield' placeholder='Password' required> 
        <input id='up-formB' type='submit' value='Submit'>
    </form>  
    <p class='help-text'>Already have an account?</p>
    <a id='login-sendB' href="index.php" target="_self">Login</a>
    
    _END;
        
        
    
    }
    


?>
    
    <script src="script.js" type="application/javascript"></script>
    


</body>

</html>
