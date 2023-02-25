<?php
if (!isset($_SESSION)) {
  session_start();
}

include 'CRUD/crudProduktet.php';
          
$produktiCRUD = new crudProduktet();
$produktiCRUD->setId($_GET['id']);
$produktiCRUD->fshijProduktinSipasID();

?>
             