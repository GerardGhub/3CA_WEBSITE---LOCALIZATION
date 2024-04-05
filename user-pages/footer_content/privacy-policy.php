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
  <!-- privacy css -->
  <link rel="stylesheet" href="privacy-policy.css">
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

  <!-- contact content -->

  <div class="privacy-container">
    <div class="privacy-pageTitle">
      <h1>PRIVACY AND POLICY</h1>
    </div>

    <div class="privacy-content">
      <div class="contentName">INTERPRETATION AND DEFENITION</div>
      <div class="subContent">Interpretation :</div>
      <div class="contentInfo">
        <p class="info">The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
      </div>
      <div class="subContent">Defenition :</div>
      <div class="contentInfo">
        <p class="info">For the purposes of this Privacy Policy:</p>
      </div>

      <div class="contentName">Account</div>
      <div class="contentInfo">
        <p class="info">Means a unique account created for You to access our Service or parts of our Service.</p>
      </div>

      <div class="contentName">Affiliate</div>
      <div class="contentInfo">
        <p class="info">Means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</p>
      </div>

      <div class="contentName">Company</div>
      <div class="contentInfo">
        <p class="info">Refers to 3CA.</p>
      </div>

      <div class="contentName">Cookies</div>
      <div class="contentInfo">
        <p class="info">are small files that are placed on Your computer, mobile device, or any other device by a website, containing the details of Your browsing history on that website among its many uses.</p>
      </div>

      <div class="contentName">Country</div>
      <div class="contentInfo">
        <p class="info">Philippines</p>
      </div>

      <div class="contentName">Device</div>
      <div class="contentInfo">
        <p class="info">Means any device that can access the Service such as a computer, a cellphone, or a digital tablet.</p>
      </div>

      <div class="contentName">Personal Data</div>
      <div class="contentInfo">
        <p class="info"> Is any information that relates to an identified or identifiable individual.</p>
      </div>

      <div class="contentName">Service</div>
      <div class="contentInfo">
        <p class="info"> Refers to the Website.</p>
      </div>

      <div class="contentName">Service Provider</div>
      <div class="contentInfo">
        <p class="info">means any natural or legal person who processes the data on behalf of the Company. It refers to third-party companies or individuals employed by the Company to facilitate the Service, to provide the Service on behalf of the Company, to perform services related to the Service or to assist the Company in analyzing how the Service is used.</p>
      </div>

      <div class="contentName">Usage Data</div>
      <div class="contentInfo">
        <p class="info">Refers to data collected automatically, either generated using the Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>
      </div>

      <div class="contentName">Website</div>
      <div class="contentInfo">
        <p class="info">Refers to 3CA, accessible from (link)</p>
      </div>

      <div class="contentName">Customers</div>
      <div class="contentInfo">
        <p class="info">Mean the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
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