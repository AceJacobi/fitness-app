<?php 
require_once 'log.php';
require_once 'functions.php';

if(isset($_GET['vEK'])){
    
    $codes = sanitizeStrings($_GET['vEK']);
    $email = sanitizeStrings($_GET['usere']);
    
    $query = "Select code from" {yourtablename} "where email='$email'";
    
    $result = $conn->query($query);
    
    if($result){        
        
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        
        $savedCode = $row['code'];
        
        if($codes === $savedCode){
            
            $query = "DELETE from" {yourtablename} "where email='$email'";
            
            $result = $conn->query($query);
            
            if($result){
                echo 'Congrats, you have been successfully verified!'."<br>"."For security reasons, please log back in."."<br>";
        
                echo <<<_CHAN
                <script>
                    alert('Successfully verified email. For security reasons you will have to sign in again.');
                    window.location = './index.php';
                </script>               
                _CHAN;
                
            }
            else {
                echo "Verification failed. Please contact support!"."<br>";
            }
            
            
        }
        
    }
    else {
        echo "Email verification failed. Please contact support right away!";
    }
    
    
    
    
}
else {
    die('Page not viewable!');
}


?>