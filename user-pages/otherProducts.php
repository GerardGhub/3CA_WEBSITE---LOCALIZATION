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
            <a href="index.php" class="back-logo">
                <div class="img-logo">
                    <img src="main_logo.png" width="50" height="50" id="mainlogo"> 
                </div>
            </a>

            <div class="logo-name">3CA CONSTRUCTION <span class="red-service" style="color: red; margin-left: 5px; font-family: Panton-Trial Heavy;"> SERVICE</span></div>
            </div>
            <!--nav items-->
            <uv class="nav-menu">   
                <li class="nav-item">
                    <a href="index.php" class="nav-link">HOME</a>
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
                <a href="index.php" class="nav-link">HOME</a>
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

    <div class="backround-Blur" id="backroundBlur"></div>

    <!-- ---------------------------------- others top  -------------------------------------- -->

    <div class="page-info">
      <a href="index.php" class="backHome">Home</a>
      <p class="separate"> | </p>
      <a href="ceiling.php" class="current-page">Other Products</a>
    </div>

    <div class="page-title">
      <h1 class="categoryName">OTHER PRODUCTS</h1>
      <p class="phrase">Browse other products of your choice here!</p>
    </div>

    <!-- ------------------------------------------- others shop content ------------------------------------------------------  -->

    <div class="ceiling-container">
      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
        </div>
      </div>

      <div class="product-card">
        <div class="productImg">
        <img src="main_img/product.png" alt="" class="product-image">
      </div>

        <div class="productName">
          <p class="product-name">Modified clay materials</p>
          <p class="productSubName">Travertine</p>
        </div>

        <div class="productInfo">
          <div class="product-price">₱ 500.00</div>
          <div class="product-option">
            <select name="" id="productVariety" class="productVariety">
              <option value="White" class="variety">White</option>
              <option value="Grey" class="variety">Grey</option>
            </select>
          </div>
        </div>

        <div class="butttons">
          <button class="buy-now" id="buy-now">Buy now</button>
          <button class="addTo-Cart" id="addTo-Cart"><i class="fa-solid fa-cart-arrow-down"></i></button>
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

    <!-- productVariety js -->
    <script src="ceilingVariety.js"></script>
</body>
</html>

<?php }
    else {
        // user is not logged in as admin, redirect to login page
        header("Location: login.php");
        exit();
    }
?>