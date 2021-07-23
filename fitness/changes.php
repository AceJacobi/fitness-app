<?php

session_start();

require_once 'log.php';

if(isset($_SESSION['cemail'])){
    
$emailS = $_SESSION['cemail'];

$cals = 0;
$pro = 0;
$fat = 0;
$sugar = 0;
$chol = 0;


if(isset($_POST['cals'])){
    $cals = $_POST['cals'];
}

if(isset($_POST['pro'])){
    $pro = $_POST['pro'];
}

if(isset($_POST['fat'])){
    $fat = $_POST['fat'];
}

if(isset($_POST['sugar'])){
    $sugar = $_POST['sugar'];
}

if(isset($_POST['chol'])){
    $chol = $_POST['chol'];
}




$query = "Select * from health where email='$emailS'";
    
$result = $conn->query($query);
    
if($result->num_rows){
    
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    $oldCal = $row['calories']; 
    $oldPro = $row['protein']; 
    $oldFat = $row['fat']; 
    $oldSug = $row['sugar']; 
    $oldCho = $row['cholesterol'];
    
    $newCal = $oldCal - $cals;
    $newPro = $oldPro - $pro;
    $newFat = $oldFat - $fat;
    $newSug = $oldSug - $sugar;
    $newCho = $oldCho - $chol;
        
    $query = "update health set email='$emailS', calories='$newCal', protein='$newPro', fat='$newFat', sugar='$newSug', cholesterol='$newCho' where email='$emailS'";
    
    
    $result = $conn->query($query);
    
    if($result){
                
        echo 'Fields updated!';  
        echo <<<_GO
        <script>
        window.location = './main.php';
        </script>       
        _GO;
            
            
            
    }
    else {
        echo 'Problem submitting data!';
    }
    
    
    
}
    else{
        echo 'Info not updated correctly!';
    }
    
    
    
}
else {
    die('This page is not for viewing!');
}

?>