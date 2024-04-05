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
  <link rel="stylesheet" href="../assets/css/index.css">
  <!--main.js-->
  <script src="../assets/js/index.js"></script>
  <!-- FAQ's css -->
  <link rel="stylesheet" href="FAQ.css">
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
            <img src="../assets/images/main_logo.png" width="50" height="50" id="mainlogo">
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
        <a href="../../index.php" class="nav-link">HOME</a>
      </li>


      <?php
      if (isset($_SESSION["userEmpID"])) {
      ?>

        <li class="nav-item">
          <a href="../core/orders.php" class="nav-link">ORDERS</a>
        </li>

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

          <div class="space-x-1">
            <div class="dropdown d-inline-block" style="margin: 10px; 10px;";>


              <button style="background-color:rgb(255, 200, 82);" type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?>
                <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
              </button>

              <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-2">
                  <a class="dropdown-item" href="../core/user_profile.php">
                    <i class="far fa-fw fa-user me-1"></i> My Profile
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../core/logout.php">
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
          <a href="../core/login.php" class="nav-link">LOG IN</a>
        </li>
      <?php
      }
      ?>

    </uv>
  </nav>

  <!-- FAQ's content -->

  <div class="faq-container">
    <div class="faq-pageTitle">
      <h1>Frequently Asked Qustions</h1>
    </div>

    <div class="faq-content">
      <div class="contentName">How to create an account?</div>
      <div class="contentInfo">
        <p class="info">1. Go to our website.</p>
        <p class="info">2. Click on “Sign Up” option.</p>
        <p class="info">3. Follow the steps and set up your account.</p>
        <p class="info">4. After that, you can proceed to log in.</p>
      </div>

      <div class="contentName">How to order?</div>
      <div class="contentInfo">
        <p class="info">1. Add the selected item to your cart.</p>
        <p class="info">2. Click on the cart icon.</p>
        <p class="info">3. Add the selected item to your cart.</p>
        <p class="info">4. Check if your address is correct</p>
        <p class="info">5. Select your payment option (COD).</p>
        <p class="info">6. Click the Order button.</p>
      </div>

      <div class="contentName">PAYMENT OPTION</div>
      <div class="contentInfo">
        <p class="info">1. Cash on Delivery (COD) - payments in cash upon delivery.</p>
      </div>

      <div class="contentName">How to receive orders?</div>
      <div class="contentInfo">
        <p class="info">1. Can be received through delivery.</p>
      </div>

      <div class="contentName">SHIPPING</div>
      <div class="contentInfo">
        <p class="info">1. Shipping is currently available in Mexico, Pampanga.</p>
      </div>

      <div class="contentName">How much are the delivary cahrges?</div>
      <div class="contentInfo">
        <p class="info">1. Less than Php 1000.00 depends on the the quantity of the product and the customers location</p>
      </div>

      <div class="contentName">How to request refunds?</div>
      <div class="contentInfo">
        <p class="info">1. To request a refund, send an email to our email account by clicking <a href="contactUs.html" class="contactUs">Contact Us</a>, with the following information and issues regarding the product.</p>
      </div>

      <div class="contentName">Is there any minimun oder requirements?</div>
      <div class="contentInfo">
        <p class="info">1. There is no minimum order requirement, and any amount of purchase is acceptable, allowing flexibility for all customers.</p>
      </div>

      <div class="contentName">How to ensure safety?</div>
      <div class="contentInfo">
        <p class="info">1. We handle all our deliveries instead of outsourcing to a third-party delivery provider to secure the goods for better customer experience.</p>
      </div>

      <div class="contentName">What products do you offer?</div>
      <div class="contentInfo">
        <p class="info">1. Wide variety of construction supplies that will suit all needs and there will be a lot of options to choose from.</p>
      </div>

      <div class="contentName">What are the areas covered by the 3CA Construction Service</div>
      <div class="contentInfo">
        <p class="info">1. The areas available are in Angeles, Mabalacat, Lubao, Bulacan, and San Fernando Pampanga.</p>
      </div>

      <div class="contentName">What is the cut-off time for deliveries?</div>
      <div class="contentInfo">
        <p class="info">1. 11:30PM is the cutoff time for deliveries.</p>
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