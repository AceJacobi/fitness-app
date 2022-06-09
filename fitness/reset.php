<?php
session_start();

require_once 'log.php';

if(isset($_POST['weight'])){
    
    $uWeight = (int)$_POST['weight'];
    
    $uAge = (int)$_POST['age'];
    
    $uHeight = (float)$_POST['height'];
    
    $gender = $_POST['gButton'];    
    
    $emailS = $_SESSION['cemail'];
        
    if($gender === 'M'){
        
        $bmr = (10*$uWeight) + (6.25*$uHeight) - (5*$uAge) + 5;
        
    }
    else{
        
        $bmr = (10*$uWeight) + (6.25*$uHeight) - (5*$uAge) - 161;
        
    }
    
    $bmr = (int)$bmr;
    
    $fat = $bmr/30;
    
    $fat = (int)$fat;
    
    $protein = .35*$uWeight;
    
    $protein = (int)$protein;
    
    $cholesterol = 300;
    
    $weightLossP = $bmr*.3;
    
    $weightLossP = (int)$weightLossP;
    
    $sugar = 30;

    echo<<<_END
    
        weight: $uWeight <br>
        
        age: $uAge <br>
        
        height: $uHeight <br>
        
        cholesterol limit: $cholesterol mg <br>
        
        gender: $gender <br>
        
        calories: $bmr <br>
        
        fat: $fat g<br>
        
        minimum daily protein: $protein g<br>
        
        calories from protein for weight loss: $weightLossP <br>
        
        email: $emailS
    
    _END;
    
    
    //submit info into database for tracking and create a form to subtract from the numbers   
    
    $query = "update" {yourtablename} "set email='$emailS', calories='$bmr', protein='$protein', fat='$fat', sugar='$sugar', cholesterol='$cholesterol', weight='$uWeight' where email='$emailS'";
    
    $result = $conn->query($query);
    
    if($result){
        
        echo 'Values Updated!';
        
        echo <<<_END
            <script>
                window.location = './main.php';
            </script>        
        _END;
    }
    else{
        echo 'Query failed! Please try again.';
    }        
}
else {
    die('This page is not available for display!');
}

    
    
    
?>
