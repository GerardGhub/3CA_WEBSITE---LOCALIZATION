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
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <!--main.js-->
  <script src="../assets/js/index.js"></script>
  <!-- return and refund  css -->
  <link rel="stylesheet" href="return-refund.css">
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
            <div class="dropdown d-inline-block" style="margin: 10px 10px;">


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

  <!-- contact content -->

  <div class="return-container">
    <div class="return-pageTitle">
      <h1>RETURN & REFUNDS</h1>
    </div>

    <div class="appreciation">
      <p class="info" style="margin-top: 20px;">Thank you for shopping at 3CA Construction Service. We appreciate the trust you have placed in us and are committed to providing you with the best possible service.</p>
    </div>

    <div class="return-content">
      <div class="contentName">Returns</div>
      <div class="contentInfo">
        <p class="info">You have 3 days to return an item from the date you received it.</p>
        <p class="info">To be eligible for a return, your item must be unused and in the same condition that you received it. Your item must be in the original packaging.</p>
        <p class="info">Your item needs to have the receipt or proof of purchase.</p>
      </div>

      <div class="contentName">Refunds</div>
      <div class="contentInfo">
        <p class="info">Once we receive your item, we will inspect it and notify you that we have received your returned item. We will immediately notify you on the status of your refund after inspecting the item.</p>
        <p class="info">If your return is approved, we will initiate a refund to your credit card (or original method of payment). You will receive the credit within a certain amount of days, depending on your card issuer's policies.</p>
      </div>

      <div class="contentName">Shipping</div>
      <div class="contentInfo">
        <p class="info">You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable. If you receive a refund, the cost of return shipping will be deducted from your refund.</p>
      </div>

      <div class="contentName">Get in Touch</div>
      <div class="contentInfo">
        <p class="info">If you have any questions on how to return your item to us, <a href="contactUs.html" class="forMoreInfo">Contact us.</a></p>
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