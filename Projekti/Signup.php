<?php
if (!isset($_SESSION)) {
  session_start();
}

require('CRUD/crudUser.php');
if (isset($_POST['create'])) {
    $user = new crudUser();
  
    $user->setUserEmail($_POST['emaili']);
  
    $kontrollimiUserit = $user->kontrolloUser();
  
    if ($kontrollimiUserit == true) {
      $_SESSION['userEkziston'] = true;
      $_SESSION['emri'] = $_POST['emrii'];
      $_SESSION['mbiemri'] = $_POST['mbiemrii'];
      $_SESSION['email'] = $_POST['emaili'];
    } else {
      $user->setUserEmri($_POST['emrii']);
      $user->setUserMbiemri($_POST['mbiemrii']);
      $user->setUserEmail($_POST['emaili']);
      $user->setUserPassword($_POST['passwordi']);

      $user->insertoUserin();
      session_destroy();
    }
  }
?>




<!DOCTYPE html>
<html>
<head>
 <title>Complex Shop</title>
 <link rel="stylesheet" href="css/products.css">
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
                    <div class="formcontainer">
                        <div class="formbtn">
                            <span>Sign Up</span>
                            
                        </div>
                        <form name="SignUpForm" onsubmit="return signup();" action='' method="POST">
                        <?php
                        if (isset($_SESSION['userEkziston'])) {
                            echo "<script>alert('Kjo llogari ekziston');</script>";
                        }
                        ?>

                        <?php
                         if (isset($_SESSION['regMeSukses'])) {
                            echo "<script>alert('U regjistruat me sukses!');</script>";
                         }
                          ?>
                            <input type="text" placeholder="Emri" id="emrii" name="emrii">
                            <input type="text" placeholder="Mbiemri" id="mbiemri" name="mbiemrii">
                            <input type="email" placeholder="Email" id="emaili" name="emaili">
                            <input type="password" placeholder="Password" id="passwordi" name="passwordi">
                            <br><br>
                            <button type="submit" class="bbutoni" name="create">Create a new account</button>
                            
                            
                            
                        </form>

                        
                    </div>
                </div>


            </div>
        </div>
    </div>

    
    <script src="js/validation.js"></script>

</body>
</html>
<?php
unset($_SESSION['userEkziston']);
unset($_SESSION['regMeSukses']);
?>