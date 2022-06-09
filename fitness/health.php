<?php
session_start();

require_once 'log.php';


if(isset($_POST['weight'])){
    
    $uWeight = (int)$_POST['weight'];
    
    $uAge = (int)$_POST['age'];
    
    $uHeight = (float)$_POST['height'];
    
    $gender = $_POST['gButton'];
    
    
    $emailS = $_SESSION['cemail'];
    
    //submit data to database after configuring the proper calorie count, protein, and total fat.
    
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

    $query = "Insert into" {column name} "VALUES('$emailS', '$bmr', '$protein', '$fat', '$sugar', '$cholesterol', '$uWeight')";
    
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
