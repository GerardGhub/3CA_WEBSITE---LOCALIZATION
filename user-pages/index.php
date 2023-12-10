<?php

    session_start();

    // check if user is logged in as regular user
    if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['userType']) && $_SESSION['userType'] === 'user') {
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
    <link rel="stylesheet" href="index.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css-bundle/swiper-bundle.min.css">
    <!-- footer css -->
    <link rel="stylesheet" href="footer.css">
    
</head>
<body>
    
    <header>
        <nav class="navigation">
            <!--logo and logo name-->
            <div class="logo">
            <a href="index.html" class="back-logo">
                <div class="img-logo">
                    <img src="main_logo.png" width="50" height="50" id="mainlogo"> 
                </div>
            </a>

            <div class="logo-name">3CA CONSTRUCTION <span class="red-service" style="color: red; margin-left: 5px; font-family: Panton-Trial Heavy;"> SERVICE</span></div>
            </div>
            <!--nav items-->
            <uv class="nav-menu">   
                <li class="nav-item">
                    <a href="" class="nav-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">CART</a>
                </li>
                <li class="nav-item" id="account-dropdown">
    <a href="" class="nav-link">ACCOUNT</a>
    <div class="dropdown-content" id="account-dropdown-content">
        <!-- User information will be displayed here -->
    </div>  
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
                <a href="index.html" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
                <a href="..." class="nav-link">ABOUT</a>
            </li>
            <li class="nav-item">
                <a href="..." class="nav-link">CART</a>
            </li>
        </uv>
    </nav>


    <!-- slider -->

    <section class="main-slider swiper mySwiper">
      <div class="wrapper swiper-wrapper">
        <div class="slide swiper-slide">
          <img src="house.jpg" alt="" class="image">
          <div class="image-data">
            <h2> MODERNIZED NOW! <br /></h2>
            <p class="text">Live Better With 3CA Costruction Service</p>
            <!-- <a href="..." class="button-start">START NOW</a> -->
          
          </div>
        </div>

        <div class="slide swiper-slide">
          <img src="main_img/img1.jpg" alt="" class="image">
          <!-- <div class="image-data">
          </div> -->
        </div>

        <div class="slide swiper-slide">
          <img src="main_img/img2.jpg" alt="" class="image">
          <!-- <div class="image-data">
          </div> -->
        </div>

        <div class="slide swiper-slide">
          <img src="main_img/img3.jpg" alt="" class="image">
          <!-- <div class="image-data">
          </div> -->
        </div>

        <div class="slide swiper-slide">
          <img src="main_img/image4.png" alt="" class="image">
          <!-- <div class="image-data">
          </div> -->
        </div>


      </div>
      <!-- slider button -->
      
      <div class="swiper-button-next slide-btn"></div>
    <div class="swiper-button-prev slide-btn" ></div>
    <div class="swiper-pagination"></div>
    </section>

     <!-- Swiper JS --> 

     <script src="js-bundle/swiper-bundle.min.js"></script>

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
        <a href="otherProducts.html" class="view-others">VIEW OTHERS</a>
      </div>

    </div>

    <!-- <a href="..." class="see-more">SEE MORE...</a> -->

    <div class="categories">
      <div class="category">
        <img src="main_img/img1.jpg" alt="" class="ceiling-pic">
        <a href="..." class="view-ceiling">VIEW CEILINGS</a>
      </div>

      <div class="category">
        <img src="main_img/img5.jpg" alt="" class="flooring-pic">
        <a href="..." class="view-flooring">VIEW FLOORINGS</a>
      </div>

      <div class="category">
        <img src="main_img/img3.jpg" alt="" class="walling-pic">
        <a href="..." class="view-walling">VIEW WALLINGS</a>
      </div>
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

     <!--Footer-->

     <footer class="footer">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <h4>Customers Service</h4>
            <ul>
              <li><a href="...">Terms and Condition</a></li>
              <li><a href="...">Privacy Policy</a></li>
              <li><a href="...">Payment</a></li>
              <li><a href="...">Return and Refunds</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Get Help</h4>
            <ul>
              <li><a href="...">FAQ</a></li>
              <li><a href="...">Contact Us</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Company</h4>
            <ul>
              <li><a href="...">About Us</a></li>
              <li><a href="...">Store Location</a></li>
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
              <li><a>MONDAY TO SUNDAY</a></li>
            </ul>
          </div>

          </div>
        </div>
      </div>
    </footer>

    <div class="reserved">
      <p>© 2023 3CA CONSTRUCTION SERVICES. ALL RIGHTS RESERVED</p>
    </div>
<script src="index.js"></script>
</body>
</html>

<?php } 
else {
    // user is not logged in as admin, redirect to login page
    header("Location: login.php");
    exit();
}
?>