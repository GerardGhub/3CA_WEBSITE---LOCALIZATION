<?php

session_start();

// check if user is logged in as regular user
if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'user') {

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="user-pages/assets/css/index.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="user-pages/assets/css/css-bundle/swiper-bundle.min.css">
    <!-- footer css -->
    <link rel="stylesheet" href="user-pages/assets/css/footer.css">


  </head>

  <body>

    <header>
      <nav class="navigation">
        <!--logo and logo name-->
        <div class="logo">
          <a href="index.php" class="back-logo">
            <div class="img-logo">
              <img src="user-pages/assets/images/main_logo.png" width="50" height="50" id="mainlogo">
            </div>
          </a>

          <div class="logo-name">3CA CONSTRUCTION <span class="red-service" style="color: red; margin-left: 5px; font-family: Panton-Trial Heavy;"> SERVICE</span></div>
        </div>

        <!--nav items-->
        <uv class="nav-menu">
          <li class="nav-item">
            <a href="index.php" class="nav-link">HOME</a>
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
              <a href="user-pages/core/login.php" class="nav-link">LOG IN</a>
            </li>
          <?php
          }
          ?>
        </uv>

        <div class="mobileBtn">
          <!-- logout Icon -->
          <button class="logoutIcon" id="logoutIcon">
            <i class="fa-solid fa-user-large"></i>
          </button>



          <!--hamburger-->
          <button class="hamburger">
            <div class="bar"></div>
          </button>
        </div>


      </nav>
    </header>

    <nav class="mobile-nav">
      <uv class="mobile-nav-menu">
        <li class="nav-item">
          <a href="index.php" class="nav-link">HOME</a>
        </li>
        <li class="nav-item">
          <a href="user-pages/core/orders.php" class="nav-link">ORDERS</a>
        </li>
        <li class="nav-item">
          <a href="user-pages/core/cart.php" class="nav-link">CART</a>
        </li>
      </uv>
    </nav>



    <!-- slider -->

    <section class="main-slider swiper mySwiper">
      <div class="wrapper swiper-wrapper">
        <div class="slide swiper-slide">
          <img src="user-pages/assets/images/house.jpg" alt="" class="image">
          <div class="image-data">
            <h2> MODERNIZED NOW! <br /></h2>
            <p class="text">Live Better With 3CA Costruction Service</p>
          </div>
        </div>

        <div class="slide swiper-slide">
          <img src="user-pages/main_img/img1.jpg" alt="" class="image">
        </div>

        <div class="slide swiper-slide">
          <img src="user-pages/main_img/img2.jpg" alt="" class="image">
        </div>

        <div class="slide swiper-slide">
          <img src="user-pages/main_img/img3.jpg" alt="" class="image">
        </div>

        <div class="slide swiper-slide">
          <img src="user-pages/main_img/image4.png" alt="" class="image">
        </div>


      </div>
      <!-- slider button -->

      <div class="swiper-button-next slide-btn"></div>
      <div class="swiper-button-prev slide-btn"></div>
      <div class="swiper-pagination"></div>
    </section>

    <!-- Swiper JS -->

    <script src="user-pages/assets/js/js-bundle/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        loop: true,
        autoplay: {
          delay: 2900,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>

    <!-- category -->

    <div class="category-container">
      <div class="category-name">
        <h1>CHECK OUR CATEGORIES</h1>
        <p>Start browsing on the categories your are interested with</p>

        <div class="other-protuct">
          <a href="#otherProducts.php" class="view-others">VIEW OTHERS</a>
        </div>

      </div>

      <!-- <a href="..." class="see-more">SEE MORE...</a> -->

      <div class="categories">
        <?php

        include 'db/config.php';
        ?>
        <?php
        // Query to fetch category information from the database
        $sql = "SELECT * FROM categories WHERE is_active = 1"; // Adjust table name as per your database schema
        $result = mysqli_query($conn, $sql);

        // Check if there are any categories
        if (mysqli_num_rows($result) > 0) {
          // Loop through each row in the result set
          while ($row = mysqli_fetch_assoc($result)) {
            // Extract category details from the current row
            $img = $row['image']; // Assuming 'image' is the column name for image URLs
            // $link = $row['link']; // Assuming 'link' is the column name for category links
            // Construct the link URL with category ID as a parameter
            $link = $row['link'] . "?id=" . $row['id'] . "&category=" . $row['category_name'];
            $text = $row['category_name']; // Assuming 'text' is the column name for category text

            $_SESSION["currentSelectProduct"] = $text;
            // Output HTML markup for the category
        ?>
            <div class="category">
              <img src="user-pages/main_img/<?php echo $img; ?>" alt="" class="walling-pic" style="width:300px; height: 250px;">
              <a href="user-pages/core/<?php echo $link; ?>" class="view-walling" style="white-space: nowrap;">
                VIEW <?php echo strtoupper($text); ?>

              </a>
            </div>
        <?php
          }
        } else {
          // No categories found in the database
          echo "No categories found.";
        }
        ?>
      </div>



    </div>

    <!-- 3ca decription -->

    <div class="description-container">
      <div class="description">
        <h2>Quality Products And Service</h2>
        <h5>At 3CA Construction Service, we offer high-quality products and services with innovative design. We help you design your dream home, indoors and outdoors, from floorings to ceiligns with carefully selected products. Whether building from scratch or renovating, we're here to assist you every step of the way.</h5>
      </div>
    </div>

    <!-- map -->

    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3852.3442182283643!2d120.72340407487742!3d15.084345865050762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396fbb0ffee0d55%3A0x9826f3ed1c361869!2s3CA%20construction%20and%20supplies!5e0!3m2!1sen!2sph!4v1700407815706!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- ------------------ ----------------------------- Footer content--------------------------------- --------------------- -->

    <footer class="footer">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <h4>Customers Service</h4>
            <ul>
              <li><a href="user-pages/footer_content/terms.php">Terms and Condition</a></li>
              <li><a href="user-pages/footer_content/privacy-policy.php">Privacy Policy</a></li>
              <li><a href="user-pages/footer_content/payment.php">Payment</a></li>
              <li><a href="user-pages/footer_content/return-refund.php">Return and Refunds</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Get Help</h4>
            <ul>
              <li><a href="user-pages/footer_content/FAQ.php">FAQ</a></li>
              <li><a href="user-pages/footer_content/contactUs.php">Contact Us</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Company</h4>
            <ul>
              <li><a href="user-pages/footer_content/aboutUs.php">About Us</a></li>
              <li><a href="user-pages/footer_content/storeLocation.php">Store Location</a></li>
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
              <li><a href="user-pages/footer_content/hours.php">MONDAY TO SUNDAY</a></li>
            </ul>
          </div>

        </div>
      </div>
      </div>
    </footer>

    <div class="reserved">
      <p>© 2023 3CA CONSTRUCTION SERVICES. ALL RIGHTS RESERVED</p>
    </div>

    <script src="user-pages/assets/js/index.js"></script>
  </body>

  </html>


<?php } else {
  // user is not logged in as admin, redirect to login page
  header("Location: user-pages/core/login.php");
  exit();
}
?>

<script src="admin-pages/assets/js/dashmix.app.min-5.4.js"></script>