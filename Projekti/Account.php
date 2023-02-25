<?php
if (!isset($_SESSION)) {
  session_start();
}

require('CRUD/crudUser.php');

if (isset($_POST['login'])) {
    $userCRUD = new crudUser();
    $userCRUD->setUserEmail($_POST['uname']);
    $kontrolloUserin = $userCRUD->kontrolloUser();
    if($kontrolloUserin == false){
        echo "<script>alert('Email eshte gabim');</script>";
    }

    if ($kontrolloUserin == true) {
        $userCRUD->setUserPassword($_POST['pword']);
        $kontrolloLlogarin = $userCRUD->kontrolloLlogarin();

        if ($kontrolloLlogarin == true) {
            $_SESSION['userAccess'] = $kontrolloLlogarin['userAccess'];
            $_SESSION['userid'] = $kontrolloLlogarin['userid'];
            $_SESSION['userEmri'] = $kontrolloLlogarin['userEmri'];
            $_SESSION['pword'] = $kontrolloLlogarin['pword'];
            $_SESSION['uname'] = $kontrolloLlogarin['uname'];
            if($_SESSION['userAccess'] === 'user'){
            
            $_SESSION['isAdmin'] = false;
            $_SESSION['onuser'] = true;
            header('location:home.php');
            }
            else if($_SESSION['userAccess'] === 'admin'){
           
            $_SESSION['isAdmin'] = true;
            $_SESSION['onuser'] = true;
            header('location:dashboard.php');
            }
        } else {
            $_SESSION['Gabim'] = true;
            echo "<script>alert('Password eshte gabim');</script>";
            
        }
    }
}

?>




<!DOCTYPE html>
<html>
<head>
 <title>Complex Shop</title>
 <link rel="stylesheet" href="css/products.css">
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
                    echo '<li><a href="./dashboard.php">Dashboard</a></li>';
                
                ?>
                <?php
                }else if(isset($_SESSION['userAccess']) && $_SESSION['userAccess'] === 'user'){
                    echo '<li><a href="./UserProfile.php">MyProfile</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="search">
            
            <?php 
            if(isset($_SESSION['onuser']) && $_SESSION['onuser'] = true ){
             echo '<a href="logout.php"><button style="position:relative;left:160px;top:22px
             ;padding-right:20px;padding-left:20px;padding-top:6px;padding-bottom:6px
             ;border-radius:5px;border:none;background-color:#ff7200;color:white;cursor:pointer" >Log out</button></a>';
            }
            ?>
        </div>
    </div>

    <div class="accountpage">
        <div class="ccontainer">
            <div class="roww">
                <div class="cc1">
                    <div class="formcontainer">
                        <div class="formbtn">
                            <span>Login</span>
                            
                        </div>
                        <form name="LoginForm" onsubmit="return login();" action='' method="POST">
                        
                           
                            <input type="email" placeholder="Email" id="uname" name="uname">
                            <input type="password" placeholder="Password" id="pword" name="pword">
                            <button type="submit" class="bbutoni" name="login">Login</button>
                            
                            <div class="bord"></div>
                            <p>Don't have an account? <a href="signup.php"><p>Sign Up</p></a></p>
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
unset($_SESSION['Gabim']);

?>