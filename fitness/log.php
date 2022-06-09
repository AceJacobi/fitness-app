<?php

$dbhost = {your db host url};

$dbuser = {your db username};

$dbpass = {your db password};

$conn = new mysqli($dbhost, $dbuser, $dbpass);

if($conn->connect_error) die('Connection unsuccessful!');

$query = 'use' {yourdbname};

$result = $conn->query($query);

if(!$result) die('Database not selected!');


?>
