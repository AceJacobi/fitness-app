<?php

session_start();
require_once 'log.php';
require_once 'functions.php';



destroySession();

echo "Signed Out!";

echo <<<_HOW
<script>
window.location = './index.php';
</script>
_HOW;



?>