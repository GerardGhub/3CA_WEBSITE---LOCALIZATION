<?php
session_start();
include("../../db/recon.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3CA Contruction Service</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--main css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <!--main.js-->
    <script src="/..asets/js/index.js"></script>
    <!-- contact us css -->
    <link rel="stylesheet" href="contactUs.css">
    <!-- header css -->
    <link rel="stylesheet" href="header.css">
    <!-- footer css -->
    <link rel="stylesheet" href="footer2.css">
</head>

<body>
    <!-- header  -->

    <header>
        <nav class="navigation">
            <!--logo and logo name-->
            <div class="logo">
            <a class="back-logo">
                <div class="img-logo">
                    <img src="main_logo2.png" width="50" height="50" id="mainlogo">
                </div>
            </a>

            <div class="logo-name">3CA CONSTRUCTION <span class="red-service" style="color: red; margin-left: 5px; font-family: Panton-Trial Heavy;"> SERVICE</span></div>
            </div>
           <!--nav items-->
           <uv class="nav-menu">
                    <li class="nav-item">
                        <a href="../../index.php" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="../core/orders.php" class="nav-link">ORDERS</a>
                    </li>
                    <?php
                    if (isset($_SESSION["userEmpID"])) {
                    ?>
                        <li class="nav-item">
                            <a href="../core/cart.php" class="nav-link">CART <span class="badge badge-light" style="color: black; background-color: orange;">
                                    <?php echo  $_SESSION["current_cart_count"] ?>
                                </span></a>

                        </li>

                        <li class="nav-item">
                            <a href="../core/message.php" class="nav-link">MESSAGE <span class="badge badge-light" style="color: black; background-color:orange;">
                                    <?php echo  $_SESSION["message_count"] ?>
                                </span></a>

                        </li>


                        <li class="nav-item">


                            <div class="space-x-12">
                                <div class="dropdown d-inline-block">

                                    <button style="background-color:rgb(255, 200, 82);" type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/<?php echo $gender; ?>.png" alt="">
                                        <span class="d-none d-sm-inline-block" style="font-size: 15px;"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></span>
                                        <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                                        <div class="p-2">
                                            <a class="dropdown-item" href="user_profile.php">
                                                <i class="far fa-fw fa-user me-1"></i> My Profile
                                            </a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php">
                                                <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>


                    <?php
                    } else {
                    ?>
                        <li class="nav-item" id="account-dropdown">
                            <a href="login.php" class="nav-link">LOG IN</a>
                        </li>
                    <?php
                    }
                    ?>
                </uv>
            <!--hamburger-->
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </header>

    <nav class="mobile-nav">
        <uv class="mobile-nav-menu">   
            <li class="nav-item">
                <a href="/user-pages/index.php" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">ORDERS</a>
            </li>
            <li class="nav-item">
                <a href="/user-pages/cart.php" class="nav-link">CART</a>
            </li>
            <li class="nav-item">
                <a href="/user-pages/login.php" class="nav-link">ACCOUNT</a>
            </li>  
        </uv>
    </nav>

    <!-- contact content -->

    <div class="contact-container">
        <div class="contact-pageTitle">
            <h1>CONTACT US</h1>
        </div>

        <div class="contact-content">
            <div class="contentName">Phone or Telephone</div>
            <div class="contentInfo">
                <p class="info">09288984368 (Smart)</p>
                <p class="info">09279339450 (Globe)</p>
                <p class="info">Telephone: 045-649-7643</p>
            </div>

            <div class="contentName">Email and Facebook Account</div>
            <div class="contentInfo">
                <p class="info"><p class="info-gmail">Email: 3caconstructionandsupplies@gmail.com</p></p>
                <p class="info">Facebook: 3CA construction services </p>              
            </div>

            <div class="contentName">Address</div>
            <div class="contentInfo">
                <p class="info">San Patricio Cupang 077, Mexico Pampanga</p>
                <p class="info">For more information about our address, you can click <a href="storeLocation.html" class="location">Store Location</a> to look for our location</p>   
            </div>
           
        </div>
    </div>

     <!--Footer-->

     <footer class="footer">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <h4>Customers Service</h4>
            <ul>
              <li><a href="terms.php">Terms and Condition</a></li>
              <li><a href="privacy-policy.php">Privacy Policy</a></li>
              <li><a href="payment.php">Payment</a></li>
              <li><a href="return-refund.php">Return and Refunds</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Get Help</h4>
            <ul>
              <li><a href="FAQ.php">FAQ</a></li>
              <li><a href="contactUs.php">Contact Us</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Company</h4>
            <ul>
              <li><a href="aboutUs.php">About Us</a></li>
              <li><a href="storeLocation.php">Store Location</a></li>
            </ul>
          </div>
  
            <div class="footer-col">
              <h4>Follow Us</h4>
              <div class="social-links">
                <a href="https://www.facebook.com/3CAconstructionandsupplies"><i class="fab fa-facebook-f"></i></a> 
              </div>
            </div>
  
            <div class="footer-col">
              <h4>HOURS</h4>
              <ul>
                <li><a href="hours.php">MONDAY TO SUNDAY</a></li>
              </ul>
            </div>
  
            </div>
          </div>
        </div>
      </footer>
  
      <div class="reserved">
        <p>© 2023 3CA CONSTRUCTION SERVICES. ALL RIGHTS RESERVED</p>
      </div>
</body>
</html>

<script src="../../admin-pages/assets/js/dashmix.app.min-5.4.js"></script>