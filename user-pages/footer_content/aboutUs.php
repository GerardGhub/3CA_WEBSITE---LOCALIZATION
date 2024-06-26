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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!--main.js-->
  <script src="../assets/js/index.js"></script>
  <!-- about us css -->
  <link rel="stylesheet" href="aboutUs.css">
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
            <div class="dropdown d-inline-block">

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

  <!-- content -->

  <div class="container">
    <div class="about">
      <h1 class="about-us">ABOUT US</h1>
    </div>

    <div class="content">
      <div class="contentName">3CA Construction Service</div>
      <div class="contentInfo">
        <p class="info">Transforming your place into a masterpiece, we are your local go-to destination for all your renovation needs. Located in San Patricio, Mexico, 3CA Construction Service is your one-stop shop for quality materials and services.</p>
        <p class="info">Transforming your home with our premium selection of tiles, flooring, walling, ceiling and more. Whether you're picturing a vintage look or a contemporary makeover, we have the perfect materials to bring your dream design to life.</p>
      </div>

      <div class="contentName">3CA MISSION</div>
      <div class="contentInfo">
        <p class="info">Our company aims to provide outstanding construction services, going above and beyond for our clients, and being honest about quality.
          We aim to deliver the best experience to every one of our stakeholders, including our community, designers, programmers, and employees.
          We strive to establish a history of trust and dependability in the construction business, also to cultivate long-lasting connections.
          We are dedicated to achieving this goal with the highest integrity, dedication, transparency, and creativity.</p>
      </div>

      <div class="contentName">3CA VISION</div>
      <div class="contentInfo">
        <p class="info">To be acknowledged as the leading national construction company in the Philippines, establishing standards for sustainability, innovation, and customer satisfaction in the construction sector.</p>
      </div>

      <div class="contentName">Why Choose 3CA Construction Service?</div>
      <div class="contentInfo">
        <p class="info">You can upgrade your area with high-quality, long-lasting materials.</p>
        <p class="info">Firmly established in the lively areas of San Patricio, Mexico, 3CA Construction Service thrives on a genuine connection with the local community.</p>
        <p class="info"> Allow our knowledgeable experts to carefully and precisely bring your concept to reality.</p>
        <p class="info">Experience convenience like never before with our delivery service. Sit back and relax as we bring the quality materials you've selected right to your doorstep.</p>
      </div>

      <p class="moreInfo">At 3CA Construction Service, we believe in turning dreams into reality.
        Your home deserves the best, and we're here to make it happen. Come see us now and start your
        house transformation adventure! For more info. you can click <a href="contactUs.html" class="forMoreInfo">Contact us</a> to further reach us.</p>


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