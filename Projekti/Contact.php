<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('CRUD/crudContacts.php');

if (isset($_POST['dergo'])) {
    $CfCRUD = new crudContacts();
  
    $CfCRUD->setEmri($_POST['nm']);
    $CfCRUD->setEmail($_POST['em']);
     $CfCRUD->setSubjekti($_POST['sb']);
    $CfCRUD->setMesazhi($_POST['msg']);
    
    $CfCRUD->insertoMesazhet();
  }
?>


<!DOCTYPE html>
<html>
<head>
 <title>Complex Shop</title>
 <link rel="stylesheet" href="css/Products.css">
 <link rel="website icon" type="png" href="images.png">
 
</head>

<body>
    <?php include 'Design/Header.php' ?>
    <fieldset style=" border: 1px solid #e1e1e1;">
        <section id="forma">
          
            <form name="ContactForm"  onsubmit="return contact();" action='' method="POST">
            <?php
                if (isset($_SESSION['regMeSukses'])) {
                echo "<script>alert('Mesazhi eshte derguar me sukses!');</script>";
                 }
            ?>
                <span >Leave a Message</span>
                <h2>We Love to hear from you</h2>
                <input type="text" placeholder="Your Name" name="nm" id="nm">
                <input type="email" placeholder="E-Mail" name="em" id="em">
                <input type="text" placeholder="Subject" name="sb" id="sb">
                <textarea cols="30" rows="10" placeholder="Your Message" name="msg" id="msg"></textarea>
                <button type="submit" class="bbutoni" id="dergo" name="dergo">Submit</button>
            </form>
        </section></fieldset>
        <?php include 'Design/Footer.php' ?>
    <script src="js/validation.js" ></script>
</body>
</html>
<?php
unset($_SESSION['regMeSukses']);
?>