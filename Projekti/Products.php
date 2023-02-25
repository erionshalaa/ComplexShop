
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
 <link rel="website icon" type="png" href="pics/images.png">
 <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
</head>
<body>
<?php include 'Design/Header.php' ?>

    <div class="content">
    </div>
            <?php
            include 'CRUD/crudProduktet.php';
          
             $produktiCRUD = new crudProduktet();
             $produktet = $produktiCRUD->lexoProduktet();
             if(!empty($produktet)){
                
            foreach ($produktet as $produkti) {
              ?>
              
                <div class="gridcont" style="  display: inline-flex;
                flex-direction:row;
                
                
                padding:100px;padding-bottom:0px">
                            
                
                <div class="col1" "> <img id="picture1" src="pics/newpics/<?php echo $produkti['foto'] ?>" alt="">
              <h4 class="par1" style="text-align:center;position:relative;left:25px">  <?php echo $produkti['emri']?></h4>
              <div class="rating" style="text-align:center;position:relative;left:25px">
                <i class="fa fa-star" ></i>
              <i class="fa fa-star" ></i>
              <i class="fa fa-star" ></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-o" ></i>
              </div>
            <p class="price1" style="text-align:center;position:relative;left:25px"><?php echo $produkti['cmimi'] ?>$</p>
            
            </div>
            </div>
            <?php
            };
            };
            ?>
        
       
    <?php include 'Design/Footer.php' ?>
</body>
</html>