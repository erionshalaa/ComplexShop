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
 <link rel="stylesheet" href="css/aboutus.css">
 <link rel="website icon" type="png" href="images.png">
</head>
<body>
<?php include 'Design/Header.php' ?>
<div class="slideshow-container">


<div class="mySlides fade">
  <div class="numbertext">1 / 2</div>
  <img src="pics/Slideshow/slide1.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 2</div>
  <img src="pics/Slideshow/slide2.jpg" style="width:100%">
  
</div>
<div class="feedback"><h3 >For every feedback you have you can</h3><br><br>
<a class="contactus" href="contact.php">Contact Us</a> </div>


<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>

</div>

    <?php include 'Design/Footer.php' ?>
    <script src="js/aboutus.js"></script>
</body>
</html>