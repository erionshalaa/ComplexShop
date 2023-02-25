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
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <p class="plogoicon"><a href="Home.php"><img class="logoicon" src="pics/images.png" ></a></p>
                <h2 class="logo"><a href="Home.php" class="logocomplex">Complex</a> </h2>
            </div>
            
        <div class="menu">
            <ul>
                <li><a href="Home.php">HOME</a> </li>
                <li><a href="Products.php">PRODUCTS</a> </li>
                <li><a href="aboutus.php">ABOUT</a> </li>
                <li><a href="Contact.php">CONTACT</a> </li>
                <li><a href="Account.php">ACCOUNT</a> </li>
                 <?php
                if (isset($_SESSION['userAccess']) && $_SESSION['userAccess'] === 'admin') {
                    echo '<li><a href="./dashboard.php" >Dashboard</a></li> <style>.srch{margin-left:40px}</style>';
                
                ?>
                <?php
                }else if(isset($_SESSION['userAccess']) && $_SESSION['userAccess'] === 'user'){
                    echo '<li><a href="./dashboard.php">MyProfile</a></li> <style>.srch{margin-left:40px}</style>';
                }
                ?>
            </ul>
        </div>
        
    </div>

    <div class="content">
    </div>
            <?php
            include 'CRUD/crudProduktet.php';
          
             $produktiCRUD = new crudProduktet();

                if (isset($_POST['shtoProd'])) {
                $_SESSION['emri'] = $_POST['EmriProduktit'];
                $_SESSION['kategoria'] = $_POST['KategoriaProduktit'];
                $_SESSION['cmimi'] = $_POST['CmimiProduktit'];
                $_SESSION['foto'] = $_POST['FotoProduktit'];
                $_SESSION['pershkrimi'] = $_POST['PershkrimiProduktit'];
                
                $produktiCRUD->insertoProduktin();

                }
                
              ?>

    



<div class="accountpage">
        <div class="ccontainer">
            <div class="roww">
                <div class="cc1">
                    <div class="formcontainer" style="padding-bottom:100px">
                        <div class="formbtn">
                            <span >New Product</span>
                            
                        </div>
                        <form name="editoProduktin" onsubmit="" action='' method="POST" >
                           
                         <input class="form-input" name="EmriProduktit" type="text" placeholder="Emri i Produktit"
                            required style="margin-left:20px">
                        <input class="form-input" name="KategoriaProduktit" type="text" placeholder="Kategoria e Produktit"
                             required style="margin-left:20px">
                         <input class="form-input" name="CmimiProduktit" type="text" placeholder="Cmimi i Produktit"
                             required style="margin-left:20px">
                         <input class="form-input" name="FotoProduktit"  type="text" placeholder="Foto Produktit"
                            required style="margin-left:20px">
                        <input class="form-input" name="PershkrimiProduktit"  type="text" placeholder="Pershkrimi i Produktit"
                             required style="margin-left:20px">
                         <div>
                            <input  type="submit" style="margin-left:30px;cursor:pointer" value="Shto Produktin" name='shtoProd'>
                            
                         </div>
                        
                        </form>

                        
                    </div>
                </div>


            </div>
        </div>
    </div>
  

    
    <div class="footer">
        <div class="containeri">
            <div class="rowi">
                <div class="footer1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and Ios Moblie Phone</p>
                    <div class="apps">
                        <img src="pics/android.png">
                        <img src="pics/ios.png">
                    </div>
                </div>
                <div class="footer2">
                    <h1 class="complex">Complex Store</h1>
                    <p class="ptext">Our Purpose Is To Substainably Make The Best <br> Tech Products Available To The Many</p>
                    
                </div>
                <div class="footer3">
                    <h3>Useful Links</h3>
                   <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                   </ul>
                </div>
                <div class="footer4">
                    <h3>Follow Us</h3>
                   <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                   </ul>
                </div>
            </div>
            <p class="copyright">Copyright 2022 - Complex Shop</p>
        </div>
    </div>
</body>
</html>