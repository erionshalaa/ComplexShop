<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'CRUD/crudUser.php';
$userCRUD = new crudUser();
                    
$userCRUD->setUserid($_SESSION['userid']);
$perdoruesi = $userCRUD->lexoUsersSipasID();
?>
<?php
             if(!empty($perdoruesi)){
                 foreach($perdoruesi as $user){ 
                
                ?>
            <?php

if (isset($_POST['perditPass'])) {
    if ($_POST['oldPass'] === $user['userPassword']) {
        $userCRUD->setUserPassword($_POST['newPass']);
        
        $userCRUD->perditesoFjalekalimin();
       
    } else {
        $_SESSION['passGabim'] = true;
    }
}
if (isset($_POST['anulo'])) {
    $_SESSION['teDhenatUPerditesuan'] = false;
    echo '<script>document.location="UserProfile.php"</script>';
}
?>
<?php
                        }
                        }else{
                            echo "no data";
                        }
                        ?>

<!DOCTYPE html>
<html lang="en">

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
                        <form name="perditPass" onsubmit="" action='' method="POST" >
                        <?php
                                if (isset($_SESSION['passGabim'])) {
                                echo '<script>alert("Passwordi eshte gabim!")</script>';
                                }

                                ?>
                         <input class="form-input" name="oldPass" type="password" placeholder="Old Password"
                            name="oldPass"  style="margin-left:20px">
                        <input class="form-input" name="newPass" type="password" placeholder="New Password"
                            name="newPass"  style="margin-left:20px">
                         
                            
                        
                         <div>
                            <input  type="submit" style="margin-left:30px;cursor:pointer" value="Perditesoni te dhenat" name='perditPass'>
                            <input  type="submit" style="margin-left:30px;cursor:pointer" value="Anulo" name='anulo'>
                         </div>
                        
                        </form>
                       
                        
                    </div>
                </div>


            </div>
        </div>
    </div>
  



</body>

</html>
<?php
unset($_SESSION['passGabim']);
?> 