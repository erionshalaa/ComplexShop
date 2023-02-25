<?php
if (!isset($_SESSION)) {
  session_start();
}

include 'CRUD/crudUser.php';
          
$UserCRUD = new crudUser();
$UserCRUD->setUserid($_GET['id']);
$UserCRUD->changeRoleToUser();

?>

