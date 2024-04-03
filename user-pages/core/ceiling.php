<?php

session_start();

if (isset($_GET['productId'])) {
    $_SESSION['productId'] = $_GET['productId'];
}



// Check if the addTo-Cart button is clicked
if (isset($_POST['addToCart'])) {
    // Retrieve product details from the form
    $productId = $_POST['productId']; // Assuming you have a unique ID for each product
    $productName = $_POST['productName'];
    $productSubName = $_POST['productSubName'];
    $variety = $_POST['variety'];
    $price = $_POST['price'];

    include("../../db/recon.php");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert product details into the tocart_db table
    $sql = "INSERT INTO tocart_db (id, productName, productSubName, variety, quantity, price) 
            VALUES ('$productId', '$productName', '$productSubName', '$variety', 1 , '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}


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
        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="../assets/css/css-bundle/swiper-bundle.min.css">
        <!-- footer css -->
        <link rel="stylesheet" href="../assets/css/footer.css">
        <!-- ceiling top css -->
        <link rel="stylesheet" href="../assets/css/categories.css">
        <!-- ceiling shop css -->
        <link rel="stylesheet" href="../assets/css/ceiling.css">

        <style>
            a {
                text-decoration: none;
                color: inherit;
            }

            a:hover {
                background-color: aqua;
            }

            .center {
                text-align: center;
                margin-bottom: 30px;
                font-size: 20px;
            }

            .product-link.active {
                /* Add your desired styles for the active item here */
                color: red;
                /* For example, change the text color to red */
            }

            .addTo-Cart {
                width: 250px;
            }

            .product-card {
                border: 2px dotted black;
            }

            /* CSS for mobile responsiveness */
            .product-option {
                display: flex;
                flex-direction: column;
            }

            .quantity-controls {
                display: flex;
                justify-content: space-between;
            }

            .indexqty {
                flex: 1;
                /* Ensures the input field takes up remaining space */
                margin: 0 10px;
                /* Adjust spacing between buttons and input */
            }

            .total-price {
                margin-top: 10px;
                /* Add some space between quantity controls and total price */
            }


            .footer {
                padding: 50px 0;
            }

            .footer-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: center; /* Center content horizontally */
            }

            .footer-col {
                flex: 1;
                margin-right: 20px;
                margin-bottom: 20px;
            }

            .footer-col h4 {
                color: #333;
                font-size: 18px;
                margin-bottom: 20px;
            }

            .footer-col ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .footer-col ul li {
                margin-bottom: 10px;
            }

            .social-links a {
                display: inline-block;
                width: 40px;
                height: 40px;
                background-color: #333;
                color: #fff;
                text-align: center;
                line-height: 40px;
                border-radius: 50%;
            }

            /* Media queries for responsiveness */
            @media (max-width: 768px) {
                .footer-col {
                    flex: 1 1 50%;
                    /* Two columns on smaller screens */
                }
            }

            @media (max-width: 576px) {
                .footer-col {
                    flex: 1 1 100%;
                    /* One column on extra-small screens */
                }
            }
        </style>

    </head>

    <body>

        <header>
            <nav class="navigation">
                <!--logo and logo name-->
                <div class="logo">
                    <a href="../../index.php" class="back-logo">
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
                        <a href="" class="nav-link">ORDERS</a>
                    </li>
                    <?php
                    if (isset($_SESSION["userEmpID"])) {
                    ?>
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link">CART <span class="badge badge-light" style="color: black; background-color: orange;">
                                    <?php echo  $_SESSION["current_cart_count"]; ?>
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
            <uv class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="orders.php" class="nav-link">ORDERS</a>
                </li>
                <?php
                if (isset($_SESSION["userEmpID"])) {
                ?>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link">CART</a>
                    </li>
                    <li class="nav-item" id="account-dropdown">
                        <a class="nav-link">ACCOUNT</a>
                    </li>
                    <li class="nav-item" id="account-dropdown">
                        <a href="logout.php" class="nav-link">LOG OUT</a>
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
        </nav>
        <!--main.js-->
        <script src="../assets/js/index.js"></script>

        <!-- ---------------------------------- celing top  -------------------------------------- -->

        <div class="page-info">



        </div>

        <div class="page-title">
            <h1 class="categoryName">
                <?php echo $_GET['category'] ?></h1>
            <p class="phrase">Browse products and our availble variety that suits on your needs here!</p>
        </div>

        <!-- ------------------------------------------- ceiling shop content ------------------------------------------------------  -->



        <div class="row" style="margin-left: 10px;">
            <div class="col-md-2 first-col">
                <h2 style="margin-bottom: 20px;">Products</h2>

                <?php
                // Database connection
                include "../../db/config.php";

                // Check if the 'id' parameter exists in the URL
                if (isset($_GET['id'])) {
                    // Get the value of the 'id' parameter
                    $categoryId = $_GET['id'];
                    // echo "Category ID: $categoryId";
                } else {
                    echo "Category ID not found in the URL";
                }

                $categoryUrlParams = $_GET['category'];

                // Query to fetch product names from tbl_product table
                $sql = "SELECT PROD.product_name,CAT.category_name, PROD.id FROM tbl_products PROD LEFT JOIN categories CAT ON CAT.id = PROD.category_id 
                where PROD.is_active = 1 AND CAT.id =  {$categoryId}";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $index = 1; // Initialize index counter
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Generate product links with product ID as a query parameter
                        echo "<a href='ceiling.php?id=$categoryId&category=$categoryUrlParams&productId=" . $row["id"] . "'>" . $row["product_name"] . "</a><br>";

                        $_SESSION["productId"] = $row["id"];
                        echo "<hr>";
                        $index++; // Increment index counter
                    }
                } else {
                    echo "0 results";
                }

                // Close connection
                // $conn->close();
                ?>



            </div>


            <div class="col-md-8">
                <!-- <h2 class="center">Variety</h2> -->
                <!-- ceiling tubes -->
                <div class="ceiling-container">
                    <?php
                    // Database connection
                    include "../../db/recon.php";

                    if (isset($_GET['productId'])) {
                        $productId = $_GET['productId'];

                        // Query to fetch product information from the products table
                        $sql = "SELECT PROD.product_name, PROD.unit_cost, VAR.image_path, PROD.id, VAR.variety,
                        VAR.id as VarId FROM tbl_products PROD INNER JOIN variety VAR ON PROD.id = VAR.product_id 
                        WHERE PROD.id = $productId
                        AND VAR.is_active =1";
                        $result = $conn->query($sql);

                        if ($result) {
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    // Generate unique IDs for each product
                                    $productNameId = "productName" . $row['VarId'];
                                    $unitPriceId = "unitPrice" . $row['VarId'];
                                    $quantityId = "quantity" . $row['VarId'];
                                    $totalPriceId = "totalPrice" . $row['VarId'];


                    ?>
                                    <div class="product-card" style="padding-bottom: 55px;">
                                        <div class="productImg">
                                            <img src="../main_img/<?php echo $row['image_path']; ?>" style="width: 100%; height: 100%;" alt="<?php echo $row['product_name']; ?>" class="product-image1">
                                        </div>

                                        <div class="productName">
                                            <p class="product-name" id="productNameJS"><?php echo $row['product_name']; ?></p>
                                        </div>

                                        <div class="productInfo">
                                            <div class="product-price">
                                                <p id="unitPrice">₱ </p><?php echo number_format($row['unit_cost'], 2); ?>
                                            </div>
                                            <div class="product-option">

                                                <?php echo $row['variety'] ?>
                                            </div>





                                        </div>

                                        <div class="product-option">
                                            <!-- Inside the product card -->
                                            <div class="quantity-controls">
                                                <button class="quantity-btn" onclick="decreaseQuantity('<?php echo $quantityId; ?>','<?php echo $totalPriceId; ?>')">-</button>
                                                <input style="text-align: center;" type="number" class="indexqty" id="<?php echo $quantityId; ?>" value="1" min="1" oninput="updateTotalPrice('<?php echo $quantityId; ?>', '<?php echo $totalPriceId; ?>')" disabled>
                                                <button class="quantity-btn" onclick="increaseQuantity('<?php echo $quantityId; ?>','<?php echo $totalPriceId; ?>')">+</button>
                                            </div>
                                            <div class="total-price">
                                                <p id="<?php echo $totalPriceId; ?>">Total Price: ₱<?php echo number_format($row['unit_cost'], 2); ?></p>
                                            </div>
                                        </div>


                                        <?php
                                        if (isset($_SESSION["userEmpID"])) {
                                        ?>
                                            <div class="buttons">

                                                <button class="addTo-Cart" type="button" name="btnAddToCart" onclick="selectProduct('<?php echo $row['product_name']; ?>', '<?php echo $row['variety']; ?>',
                                                '<?php echo $row['unit_cost']; ?>',
                                                '<?php echo $quantityId; ?>')" value="<?php echo $row['id']; ?>">Add to Cart <i class="fa-solid fa-cart-arrow-down"></i></button>


                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>
                    <?php
                                }
                            } else {
                                echo "0 results";
                            }
                        } else {
                            echo "Error executing query: " . $conn->error;
                        }

                        // Close connection
                        $conn->close();
                    } else {
                        echo "";
                        // echo "Product ID not set in URL.";
                    }
                    ?>






                    <!-- end of ceiling tubes -->

                </div>

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
        </footer>


        <div class="reserved">
            <p>© 2023 3CA CONSTRUCTION SERVICES. ALL RIGHTS RESERVED</p>
        </div>

        <!-- productVariety js -->
        <script src="../assets/js/ceiling.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <script>
            var globalUnitCost = 0;

            function selectProduct(productNameFetch, varietyFetch, productUnitCost, productQty) {

                var selectedProductQty = document.getElementById(productQty).value;

                $.ajax({
                    url: "../ajax/ajax-ceiling.php",
                    method: "POST",
                    data: {
                        productName: productNameFetch,
                        productPrice: productUnitCost,
                        productVariety: varietyFetch,
                        productQuantity: selectedProductQty
                    },
                    success: function(d) {

                        alert("You have successfully added this item in your cart.");
                        // Redirect to cart.php after a short delay (e.g., 2 seconds)
                        setTimeout(function() {
                            var currentUrl = window.location.href;
                            window.location.href = currentUrl;
                        }, 100); // Adjust the delay as needed (in milliseconds)
                    },
                    error: function(d) {
                        console.log(d);
                    }
                })


            }




            function increaseQuantity(quantityId, totalPriceId) {

                let quantityInput = document.getElementById(quantityId);
                let indexqty = document.getElementsByClassName("indexqty")[quantityId];
                let indexqtyvalue = indexqty.value;

                let currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
                indexqtyvalue = parseInt(indexqtyvalue) + 1;
                updateTotalPrice(quantityId, totalPriceId, indexqtyvalue);
            }

            function decreaseQuantity(quantityId, totalPriceId) {
                let quantityInput = document.getElementById(quantityId);
                let indexqty = document.getElementsByClassName("indexqty")[quantityId];
                let indexqtyvalue = indexqty.value;
                let currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                    indexqtyvalue = parseInt(indexqtyvalue) - 1;
                    updateTotalPrice(quantityId, totalPriceId, indexqtyvalue);
                }
            }

            function updateTotalPrice(quantityId, totalPriceId, indexQty) {


                let indexucost = document.getElementById("unitPrice").textContent;
                // let unitPrice = parseFloat(document.getElementById('unitPrice').textContent);

                let stringValue = indexucost;
                let floatValue = parseFloat(stringValue.replace(/,/g, ''));

                let unitPrice = floatValue;
                let quantity = parseInt(document.getElementById(quantityId).value);
                let totalPriceElement = document.getElementById(totalPriceId);;
                let totalPrice = unitPrice * indexQty;


                totalPriceElement.textContent = totalPrice.toFixed(2);

            }
        </script>
    </body>

    </html>

<?php } else {
    // user is not logged in as admin, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!-- ceiling.php -->
<script src="../../admin-pages/assets/js/dashmix.app.min-5.4.js"></script>