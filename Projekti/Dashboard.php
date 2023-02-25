<?php 
    
    if (!isset($_SESSION)) {
        session_start();
      }
    
?>

<!DOCTYPE html>
<html>
<head>
 <title>Complex Shop</title>
 <link rel="stylesheet" href="css/Products.css">
 <link rel="website icon" type="png" href="images.png">
 <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   
</head>
<body> 
    
    <div class="col-md-12">
        <a href="home.php" class="btn btn-primary" style="position:relative
        ;top:20px;left:20px;background-color:#ff7200;
        border:none;border-radius:5px">Back to Home</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Users Information</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
          <table class="table table-hover">
    <thead>
              <tr>
               
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>E-Mail</th>
                <th>Password</th>
                <th>User-Access</th>
                <th>Action</th>

              </tr>
    </thead>
    <tbody>

    <?php
       include 'CRUD/crudUser.php';
       $model = new crudUser();
       $rows = $model->lexoUsers();
       $i = 1;
       if(!empty($rows)){
        foreach($rows as $row){ 
       
       ?>
       <tr>
                
                <td><?php echo $row['userid']; ?></td>
                <td><?php echo $row['userEmri']; ?></td>
                <td><?php echo $row['userMbiemri']; ?></td>
                <td><?php echo $row['userEmail']; ?></td>
                <td><?php echo $row['userPassword']; ?></td>
                <td><?php echo $row['userAccess']; ?></td>
                <td>
                   
                  <a  href="changeRoleToAdmin.php?id=<?php echo $row['userid']; ?>" class="badge badge-success">Change role to Admin</a>
                  <a href="changeRoleToUser.php?id=<?php echo $row['userid']; ?>" class="badge badge-success">Change role to User</a> 
                </td>
              </tr>
              <?php
                }
              }else{
                echo "no data";
            }
              ?>
              </tbody>
              </table>
        </div>
      </div>
    </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Contacts from users</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
       
          <table class="table table-hover">
    <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
                

              </tr>
    </thead>
    <tbody>

    <?php
       include 'CRUD/crudContacts.php';
       $model = new crudContacts();
       $rows = $model->lexoMesazhet();
       
       if(!empty($rows)){
        foreach($rows as $row){ 
       
       ?>
       <tr>
                
                <td><?php echo $row['idCF']; ?></td>
                <td><?php echo $row['emriCF']; ?></td>
                <td><?php echo $row['emailCF']; ?></td>
                <td><?php echo $row['subjektiCF']; ?></td>
                <td><?php echo $row['mesazhiCF']; ?></td>
                
                <td>
                  <a href="deleteContact.php?id=<?php echo $row['idCF']; ?>" class="badge badge-danger">Delete</a>
                  
                </td>
              </tr>
              <?php
                }
              }else{
                echo "no data";
            }
              ?>
              
              </tbody>
              </table>
              <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Products Information</h1>
          <hr style="height: 1px;color: black;background-color: black;">
          <a href="addNewProduct.php" class="btn btn-primary" style="margin-bottom:20px">Add New Product</a>
        </div>
      </div>
      <div class="row">
          <table class="table table-hover">
    <thead>
              <tr>
               
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Picture</th>
                <th>Description</th>
                <th>Action</th>

              </tr>
              
    </thead>
    <tbody>
        

<?php
   include 'CRUD/crudProduktet.php';
   $model = new crudProduktet();
   $rows = $model->lexoProduktet();
   
   if(!empty($rows)){
    foreach($rows as $row){ 
   
   ?>
   <tr>
            
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['emri']; ?></td>
            <td><?php echo $row['kategoria']; ?></td>
            <td><?php echo $row['cmimi']; ?></td>
            <td><?php echo $row['foto']; ?></td>
            <td><?php echo $row['pershkrimi']; ?></td>
            
            <td>
              <a href="deleteProduct.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>
              <a href="editProduct.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
            </td>
          </tr>
          <?php
            }
          }else{
            echo "no data";
        }
          ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
    
</body>
</html>