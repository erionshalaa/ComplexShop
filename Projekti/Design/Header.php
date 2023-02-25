<div class="main">
        <div class="navbar">
            <div class="icon">
                <p class="plogoicon"><a href=""><img class="logoicon" src="pics/images.png" ></a></p>
                <h2 class="logo">Complex</h2>
            </div>
            
        <div class="menu">
            <ul>
                <li><a href="Home.php">HOME</a> </li>
                <li><a href="Products.php">PRODUCTS</a> </li>
                <li><a href="AboutUs.php">ABOUT</a> </li>
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
            <input class="srch"  type="search" placeholder="Search for products">
            <a href="#"><button class="buttoni" >Search</button></a>
          
            
        </div>
    </div>
