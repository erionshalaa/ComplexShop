<?php
if (!isset($_SESSION)) {
    session_start();
  }
include 'CRUD/crudUser.php';
$userCRUD = new crudUser();
        
$userCRUD->setUserid($_SESSION['userid']);
$useri = $userCRUD->lexoUsersSipasID();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Complex Shop</title>
 <link rel="stylesheet" href="css/Products.css">
 <link rel="website icon" type="png" href="images.png">
 <style>
    .info{
        margin-left: 80px;
        margin-bottom: 30px;
        font-size: 18px;
    }
    .button{ 
        margin-left: 75px;
        margin-bottom:30px;
        padding:10px 25px;
        border:none;
        border-radius:20px;
        background-color:#ff7200;
        color:white;
        font-weight:normal;
        cursor:pointer;
        transition:0.7s;
    }
    .button:hover{
        opacity:0.6;
    }
    .button:active{
        opacity:0.9;
    }
    .formcontainer{
        height:420px;
    }
 </style>
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
                    <div class="formcontainer" >
                        <div class="formbtn">
                            <span>Te Dhenat </span>
                            
                        </div>
                        <form >
                            
                        <div class="containerDashboardP">
  <?php
    if(!empty($useri)){
        foreach($useri as $user){ 
       
       ?>
   
    
  
    <div class="info">
        <strong >Emri:</strong>
          <?php echo $user['userEmri']; ?>
    </div>   
    <div class="info"> 
        <strong>Mbiemri:</strong>
          <?php echo $user['userMbiemri']; ?>
        </div> 
    <div class="info">
      <strong>Email:</strong>
          <?php echo $user['userEmail']; ?>
          </div>
    <div class="info">
      <strong>Aksesi:</strong>
          <?php echo $user['userAccess']; ?>
          </div>

    <button class="button"><a style= "color:white;text-decoration:none" href="EditUserProfile.php?userid=<?php echo $user['userid']; ?>"> Perditeso te Dhenat</a></button><br>
     <button class="button"> <a style="color:white;text-decoration:none" href="ChangePassword.php?id= <?php echo $user['userid'];?>">Ndrysho Fjalekalimin</a></button>
   
      <?php
                }
              }else{
                echo "no data";
            }
              ?>
      
      </tr>
    </table>

                            
                            
                            
                        </form>

                        
                    </div>
                </div>


            </div>
        </div>
    </div>

   



 
    


  </div>

  
</body>

</html>

<?php unset($_SESSION['teDhenatUPerditesuan']); ?>