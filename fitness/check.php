<?php

require_once 'log.php';
require_once 'functions.php';


if(count($_POST) > 0){
    
    $checkThis = sanitizeStrings($_POST['users']);
    
    $query = "Select * from" {yourtablename} "where username='$checkThis'";    
    
    $result = $conn->query($query);
    
    if($result->num_rows){
        
        echo "<span>Username not available!</span>";
        
    }
    else {
        
        echo "<span>Username available!</span>";
        
    }
    
    
    
}
else {
    die('This page not accessible!');
}



?>
