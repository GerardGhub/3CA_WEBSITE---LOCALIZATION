<?php

session_start();

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
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="../assets/css/css-bundle/swiper-bundle.min.css">
  <!-- footer css -->
  <link rel="stylesheet" href="../assets/css/footer.css">
  <!-- log in css -->
  <link rel="stylesheet" href="../assets/css/login.css">
  <!-- captcha js -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

  <header>
    <nav class="navigation">
      <!--logo and logo name-->
      <div class="logo">
        <a href="" class="back-logo">
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

        <?php
        if (isset($_SESSION["userEmpID"])) {
        ?>

          <li class="nav-item">
            <a href="orders.php" class="nav-link">ORDERS</a>
          </li>

          <li class="nav-item">
            <a href="cart.php" class="nav-link">CART</a>
          </li>
          <li class="nav-item" id="account-dropdown">
            <a class="nav-link">ACCOUNT</a>
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
              <a href="user-pages/core/orders.php" class="nav-link">ORDERS</a>
            </li>

            <li class="nav-item">
              <a href="user-pages/core/cart.php" class="nav-link">CART <span class="badge badge-light" style="color: black; background-color: orange;">
                  <?php echo  $_SESSION["current_cart_count"] ?>
                </span></a>

            </li>

            <li class="nav-item">
              <a href="user-pages/core/message.php" class="nav-link">MESSAGE <span class="badge badge-light" style="color: black; background-color:orange;">
                  <?php echo  $_SESSION["message_count"] ?>
                </span></a>

            </li>


            <li class="nav-item">
              <!-- <a class="nav-link">ACCOUNT</a> -->
              <div class="space-x-1">
                <div class="dropdown d-inline-block">

                  <button style="background-color:rgb(255, 200, 82);" type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/<?php echo $gender; ?>.png" alt="">
                    <span class="d-none d-sm-inline-block" style="font-size: 15px;"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></span>
                    <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-2">
                      <a class="dropdown-item" href="user-pages/core/user_profile.php">
                        <i class="far fa-fw fa-user me-1"></i> My Profile
                      </a>
                      <div role="separator" class="dropdown-divider"></div>
                      <a class="dropdown-item" href="user-pages/core/logout.php">
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
  <!--main.js-->

  <!-- login/sign in form -->

  <div class="container-main">

    <div id="loginError" style="display: none; color: red; position:absolute">Incorrect username or password. Please register.</div>
    <div class="form-box" id="form-container">

      <!-- log in form -->



      <div class="login-container" id="login">
        <div class="clickable">
          <span> Don't have an account yet? <a onclick="register()" style="margin-left: 10px;">Sign Up</a></span>
          <header class="sign-up">Login</header>
        </div>

        <form action="../action/nowLogin.php" method="POST">
          <div class="input-box">
            <input type="text" class="input-field" placeholder="Username or Email" name="email" required>
            <i class="fa-solid fa-user"></i>
          </div>

          <div class="input-box">
            <input type="password" class="input-field" id="input-password" placeholder="Password" name="password" style="padding-right: 50px;">
            <i class="fa-solid fa-lock"></i>
            <a class="password-toggle" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye-slash" id="toggle-visible"></i></a>
          </div>

          <div class="input-box">
            <input type="submit" class="submit" name="login" value="Login">
          </div>

          <div class="check-box">
            <div class="remember">
              <input type="checkbox" id="login-check">
              <label for="register-check">Remember Me</label>
            </div>

            <div class="forget">
              <label><a href="#">Forget Password?</a></label>
            </div>
          </div>

          <div class="g-recaptcha" data-sitekey="6LcvfKkpAAAAADqnvLEJgxP8UnggJWhGiRLq1Gda"></div>

        </form>
      </div>

      <!-- register form -->

      <div class="register-container" id="register">
        <div class="clickable">
          <span> Have an account? <a onclick="login()" style="margin-left: 10px;">Login</a></span>
          <header class="sign-up">Sign up</header>
        </div>

        <form action="../action/register.php" method="POST">
          <div class="input-box">
            <input type="text" class="input-field" placeholder="Firstname" name="firstName" required>
            <i class="fa-solid fa-user"></i>
          </div>

          <div class="two-forms">
            <div class="input-box">
              <input type="text" class="input-field" name="middleName" placeholder="Middlename (optional)">
              <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-box">
              <input type="text" class="input-field" name="lastName" placeholder="Lastname" required>
              <i class="fa-solid fa-user"></i>
            </div>
          </div>

          <div class="input-box">
            <input type="email" class="input-field" name="username" placeholder="Email" required>
            <i class="fa-solid fa-envelope"></i>
          </div>

          <div class="input-box">
            <input type="password" class="input-field" id="input-password-register" name="password" placeholder="Password" style="padding-right: 50px;" required>
            <i class="fa-solid fa-lock"></i>
            <a class="passwordReg-toggle" onclick="togglePasswordRegVisibility()"><i class="fa-solid fa-eye-slash" id="reg-toggle-visible"></i></a>
          </div>

          <div class="input-box">
            <input type="text" class="input-field" name="contactNumber" placeholder="Contact No." style="margin-bottom: 20px;" required>
          </div>

          <div class="input-box">
            <input type="text" class="input-field" name="address" placeholder="Address" style="margin-bottom: 20px;" required>
          </div>

          <div class="two-input">

            <div class="input-box">
              <select class="input-field" name="sex">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>

            <div class="input-box">
              <input type="number" class="input-field" name="age" placeholder="Enter age" style="width: 100%;" required>
            </div>

          </div>

          <div class="input-box">
            <input type="submit" class="submit" name="signIn" value="Register">
          </div>

          <div class="terms">
            <input type="checkbox" id="terms-check" required>
            <label for="terms-check"><a href="../footer_content/terms.php" target="_blank" class="termsLink">Terms and Conditions</a></label>
            <p class="terms-description">In creating an account to this website, you must agree to our "Terms and Conditions"</p>
          </div>

      </div>

      </form>
    </div>

  </div>
  </div>


  <!-- ------------------ ----------------------------- Footer content--------------------------------- --------------------- -->

  <footer class="footer">
    <div class="footer-container">
      <div class="row">
        <div class="footer-col">
          <h4>Customers Service</h4>
          <ul>
            <li><a href="../footer_content/terms.php">Terms and Condition</a></li>
            <li><a href="../footer_content/privacy-policy.php">Privacy Policy</a></li>
            <li><a href="../footer_content/payment.php">Payment</a></li>
            <li><a href="../footer_content/return-refund.php">Return and Refunds</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Get Help</h4>
          <ul>
            <li><a href="../footer_content/FAQ.php">FAQ</a></li>
            <li><a href="../footer_content/contactUs.php">Contact Us</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Company</h4>
          <ul>
            <li><a href="../footer_content/aboutUs.php">About Us</a></li>
            <li><a href="../footer_content/storeLocation.php">Store Location</a></li>
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
            <li><a href="../footer_content/hours.php">MONDAY TO SUNDAY</a></li>
          </ul>
        </div>

      </div>
    </div>
    </div>
  </footer>

  <div class="reserved">
    <p>© 2023 3CA CONSTRUCTION SERVICES. ALL RIGHTS RESERVED</p>
  </div>

  <!-- login css -->
  <script src="../assets/js/login.js"></script>
  <script src="../assets/js/index.js"></script>
</body>

</html>

<!-- login.php -->