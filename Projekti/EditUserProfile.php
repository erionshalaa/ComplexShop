
<?php
if (!isset($_SESSION)) {
  session_start();
}

          
include 'CRUD/crudUser.php';
$userCRUD = new crudUser();
                    
$userCRUD->setUserid($_GET['userid']);
$useri = $userCRUD->lexoUsersSipasID();
           

?>
 <?php
             if(!empty($useri)){
                 foreach($useri as $user){ 
                
                ?>
            <?php
             
            

                if (isset($_POST['editoUser'])) {
                
                $userCRUD->setUserEmri($_POST['emri']);
                $userCRUD->setUserMbiemri($_POST['mbiemri']);
                $userCRUD->setUserEmail($_POST['email']);
                $userCRUD->setUserAccess($_POST['aksesi']);

                
                $userCRUD->editoUserin();
                echo '<script>alert("Te dhenat u perditesuan me sukses!")</script>';
                
                }
                if (isset($_POST['anulo'])) {
                echo '<script>document.location="UserProfile.php"</script>';
                }
             
              ?>
<!DOCTYPE html>
<html>
<head>
 <title>Complex Shop</title>
 <link rel="stylesheet" href="css/Products.css">
 <link rel="website icon" type="png" href="pics/images.png">
 
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
                    echo '<li><a href="./UserProfile.php">MyProfile</a></li> <style>.srch{margin-left:40px}</style>';
                }
                ?>
            </ul>
        </div>
        
    </div>


    
<div class="accountpage">
        <div class="ccontainer">
            <div class="roww">
                <div class="cc1">
                    <div class="formcontainer" style="padding-bottom:100px">
                        <div class="formbtn">
                            <span >Te dhenat</span>
                            
                        </div>
                        <form name="editoUser" onsubmit="" action='' method="POST" >
                            <?php
                                if (isset($_SESSION['userEkziston'])) {
                                    
                                    echo "<script>alert('Kjo llogari ekziston');</script>";
                                }
                            ?>
                         <input class="form-input" name="emri" type="text" placeholder="Emri"
                            value='<?php echo $user['userEmri'] ?>' required style="margin-left:20px">
                        <input class="form-input" name="mbiemri" type="text" placeholder="Mbiemri"
                            value='<?php echo $user['userMbiemri'] ?>' required style="margin-left:20px">
                         <input class="form-input" name="email" type="text" placeholder="Email"
                            value='<?php echo $user['userEmail'] ?>' required style="margin-left:20px">
                         <input class="form-input" name="aksesi"  type="text" placeholder="Aksesi"
                            value='<?php echo $user['userAccess'] ?>' readonly style="margin-left:20px ">
                            
                        
                         <div>
                            <input  type="submit" style="margin-left:30px;cursor:pointer" value="Perditesoni te dhenat" name='editoUser'>
                            <input  type="submit" style="margin-left:30px;cursor:pointer" value="Anulo" name='anulo'>
                         </div>
                        
                        </form>
                        <?php
                        }
                        }else{
                            echo "no data";
                        }
                        ?>
                        
                    </div>
                </div>


            </div>
        </div>
    </div>
  

</body>
</html>