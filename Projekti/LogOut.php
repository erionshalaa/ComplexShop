<?php

session_start();

  
session_destroy();
$_SESSION['onuser'] = false;
header("location: account.php");
exit();
?>