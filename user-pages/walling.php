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
    <!-- ceiling top css -->
    <link rel="stylesheet" href="categories.css">
    <!-- walling shop css -->
    <link rel="stylesheet" href="walling.css">
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
                    <a href="index.html" class="nav-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">CART</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">ACCOUNT</a>
                </li>  
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
                <a href="cart.php" class="nav-link">CART</a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link">ACCOUNT</a>
            </li>  
        </uv>
    </nav>
    <!--main.js-->
    <script src="index.js"></script>

    <!-- ---------------------------------- walling top  -------------------------------------- -->

    <div class="page-info">
      <a href="index.html" class="backHome">Home</a>
      <p class="separate"> | </p>
      <a href="ceiling.html" class="current-page">Walling</a>
    </div>

    <div class="page-title">
      <h1 class="categoryName">WALLING</h1>
      <p class="phrase">Browse walling needs of your choice here!</p>
    </div>

    <!-- ------------------------------------------- walling shop content ------------------------------------------------------  -->

    <div class="ceiling-container">
      <!-- fluted indoor -->
      <div class="product-card">
        <div class="productImg">
        <img src="wall-flutted-indoor/WALL_FLUTTED_INDOOR__CEDAR_.png" alt="" class="product-image1" >
      </div>

        <div class="productName">
          <p class="product-name" name="productName" >Fluted Indoor (155 x 25 x 2900mm)</p>
          <p class="productSubName"></p>
        </div>

        <div class="productInfo">
          <div class="product-price" name="price"><p>₱</p>500.00</div>
          <div class="product-option">
            <select name="variety" id="productVariety" class="productVariety">
              <option value="Cedar" class="variety">Cedar</option>
              <option value="Golden Oak" class="variety">Golden Oak</option>
              <option value="Onyx" class="variety">Onyx</option>
              <option value="Pebble Grey" class="variety">Pebble Grey</option>
              <option value="Red Cedar" class="variety">Red Cedar</option>
              <option value="Sand Grey" class="variety">Sand Grey</option>
              <option value="Wallnut" class="variety">Wallnut</option>
              <option value="White Oak" class="variety">White Oak</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart" name="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <!-- fluted outdoor -->
      <div class="product-card">
        <div class="productImg">
        <img src="fluted_outdoor/FLUTED OUTDOOR (yellow brown).png" style="transform: scale(1.35);" alt="" class="product-image2">
      </div>

        <div class="productName">
          <p class="product-name">Fluted Outdoor (218 x 28 x 2900mm)</p>
          <p class="productSubName"></p>
        </div>

        <div class="productInfo">
          <div class="product-price"><p>₱</p> 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety2" class="productVariety">
              <option value="YellowBrown-fluted-outdoor" class="variety">Yellow Brown</option>
              <option value="Wallnut-fluted-outdoor" class="variety">Wallnut</option>
              <option value="Teak-fluted-outdoor" class="variety">Teak</option>
              <option value="Mahogany-fluted-outdoor" class="variety">Mahogany</option>
              <option value="CharcoalBlack-fluted-outdoor" class="variety">Charcoal Black</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <!-- fluted outdoor CE -->
      <div class="product-card">
        <div class="productImg" >
        <img src="fluted_outdoor/FLUTED OUTDOOR (CO-EXTRUDED CARAMEL).jpg.png" style="width: 85%; height: 85%;" alt="" class="product-image3">
      </div>

        <div class="productName">
          <p class="product-name">Fluted Outdoor Co-Extruded (218 x 28 x 2900mm)</p>
          <p class="productSubName"></p>
        </div>

        <div class="productInfo">
          <div class="product-price"><p>₱</p> 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety3" class="productVariety">
              <option value="Expresso-fluted-outdoor-CE" class="variety">Expresso</option>
              <option value="Black-fluted-outdoor-CE" class="variety">Black</option>
              <option value="Caramel-fluted-outdoor-CE" class="variety">Caramal</option>
              <option value="Chocolate-fluted-outdoor-CE" class="variety">Chocolate</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <!-- clay brick -->
      <!-- <div class="product-card">
        <div class="productImg" >
        <img src="singleProducts/WALL(CLAYBRICKS[MIX CLAY RED]).jpg .jpg" style="transform: scale(1);" alt="" class="product-image4">
      </div>

        <div class="productName">
          <p class="product-name">Clay Bricks</p>
          <p class="productSubName"></p>
        </div>

        <div class="productInfo">
          <div class="product-price"><p>₱</p> 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety4" class="productVariety">
              <option value="Expresso-fluted-outdoor-CE" class="variety">Mix Clay Red</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div> -->

    

      
    </div>

    <!--Footer-->

    <footer class="footer">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <h4>Customers Service</h4>
            <ul>
              <li><a href="footer_content/terms.html">Terms and Condition</a></li>
              <li><a href="footer_content/privacy-policy.html">Privacy Policy</a></li>
              <li><a href="footer_content/payment.html">Payment</a></li>
              <li><a href="footer_content/return-refund.html">Return and Refunds</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Get Help</h4>
            <ul>
              <li><a href="footer_content/FAQ.html">FAQ</a></li>
              <li><a href="footer_content/contactUs.html">Contact Us</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Company</h4>
            <ul>
              <li><a href="footer_content/aboutUs.html">About Us</a></li>
              <li><a href="footer_content/storeLocation.html">Store Location</a></li>
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
                <li><a href="footer_content/hours.html">MONDAY TO SUNDAY</a></li>
              </ul>
            </div>
  
            </div>
          </div>
        </div>
      </footer>
  
      <div class="reserved">
        <p>© 2023 3CA CONSTRUCTION SERVICES. ALL RIGHTS RESERVED</p>
      </div>


   <script src="walling.js"></script>
</body>
</html>