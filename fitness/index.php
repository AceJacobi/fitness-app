<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Body Buddy</title>

    <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body id='signin-body'>

    <img id='scale-logo' src="scale.png" alt="Balance Scales">
    
    <h1 class="header">Body Buddy</h1>
    
    <button id="login-button" onclick="openSForm()">Sign In</button>
    
    <br>
        <br>
       
    <div id='display-form-div' class="login-form-div">
        
        

    <?php
    
    session_start();
    
    require_once 'log.php';
    require_once 'functions.php';
    
    
    if(isset($_POST['emailfield'])){
        
        $subEmail = sanitizeStrings($_POST['emailfield']);
        $subPass = sanitizeStrings($_POST['passfield']);   
        
        
        
        $query = "Select * from" {yourtablename} "where email='$subEmail' and pass='$subPass'";
        
        $result = $conn->query($query);
        
        if(!$result->num_rows){
            echo 'Username or Password incorrect!';
            
        }
        else {
            
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            
            $uName = $row['username'];  
            $uPass = $row['pass'];
            $uEmail = $row['email'];
            
            $_SESSION['cuser'] = $uName;
            $_SESSION['cpass'] = $uPass;
            $_SESSION['cemail'] = $uEmail;
            
            echo <<<_ONE
            <script>
                window.location = './main.php';
            </script>           
            _ONE;
            
        }
        
        
        
    }
    else {    
    
    
    echo <<<_END   
    <form class="form-format" action='index.php' method='post'>
        <p id='form-info'>Login</p>
        <input type='email' name='emailfield' maxlength=30 placeholder='Email' required> 
        <input type='password' name='passfield' placeholder='Password' required> 
        <input id='submit-login-b' type='submit' value='Submit'>
    </form>    
    <a id='fix-pass-link' href='./fixpass.php' target='_self'>
    Forgot Password?
    </a>   
    _END;
    
    }
    
    
    
    ?>

    </div>

    
    <a id="signup-button" href="signup.php" target="_self">Sign Up</a>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="script2.js" type="application/javascript"></script>

</body>

</html>
