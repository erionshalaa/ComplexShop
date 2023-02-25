<?php
if (!isset($_SESSION)) {
  session_start();
}

include 'CRUD/crudContacts.php';
          
$produktiCRUD = new crudContacts();
$produktiCRUD->setId($_GET['id']);
$produktiCRUD->fshijMesazhinSipasID();

?>