<?php
session_start();

include("../../db/recon.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/index.css">

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="../assets/css/css-bundle/swiper-bundle.min.css">
        <!-- footer css -->
        <link rel="stylesheet" href="../assets/css/footer.css">
        <!-- ceiling top css -->
        <link rel="stylesheet" href="../assets/css/categories.css">
        <!-- cart css -->
        <link rel="stylesheet" href="../assets/css/cart.css">
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
                        <a href="orders.php" class="nav-link">ORDERS</a>
                    </li>
                    <?php
                    if (isset($_SESSION["userEmpID"])) {
                    ?>
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link">CART <span class="badge badge-light" style="color: black; background-color: orange;">
                                    <?php echo  $_SESSION["current_cart_count"] ?>
                                </span></a>

                        </li>

                        <li class="nav-item">
                            <a href="message.php" class="nav-link">MESSAGE <span class="badge badge-light" style="color: black; background-color:orange;">
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
            <uv class="nav-menu">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">HOME</a>
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

        <!-- ------------------ ----------------------------- Cart content--------------------------------- --------------------- -->

        <div class="noItemContainer" style="margin-bottom:300px;">


            <?php
            $sqlCart = "SELECT * FROM tocart_db WHERE NOT reference='' AND userid={$_SESSION["userEmpID"]} AND is_active = 1 AND
             NOT message='' ";
            $queryCart = mysqli_query($conn, $sqlCart);

            if (mysqli_num_rows($queryCart) != 0) {
            ?>


                <div style="position: absolute; top: 15%; left: 0; width: 80%; margin-left: 10%; margin-right: 10%">
                    <?php require_once('../../admin-pages/notif/check-reply.php'); ?>
                    <table style="width: 100%">
                        <thead>
                            <th style="border: 1px solid black; padding: 5px; text-align: center">Product Name</th>
                            <th style="border: 1px solid black; text-align: center">Product Variety</th>
                            <th style="border: 1px solid black; text-align: center">Unit Cost</th>
                            <th style="border: 1px solid black; text-align: center">Quantity</th>
                            <th style="border: 1px solid black; text-align: center">Price</th>
                            <th style="border: 1px solid black; text-align: center">Date Ordered</th>
                            <th style="border: 1px solid black; text-align: center">Message</th>

                        </thead>
                        <tbody>
                            <?php
                            $sum = 0;
                            $sqlCart = "SELECT * FROM tocart_db WHERE NOT reference='' AND userid={$_SESSION["userEmpID"]} AND is_active = 1 AND
                            NOT message='' ";
                            $queryCart = mysqli_query($conn, $sqlCart);
                            while ($fetchCart = mysqli_fetch_array($queryCart)) {
                                $sum = $sum + $fetchCart["price"];
                            ?>
                                <tr>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center"><?= $fetchCart["productName"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center"><?= $fetchCart["variety"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center">&#8369; <?= number_format($fetchCart["unitcost"], 2); ?></td>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center"><?= $fetchCart["quantity"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center"><?= $fetchCart["date_ordered"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center">&#8369; <?= number_format($fetchCart["price"], 2); ?></td>
                                    <td style="border: 1px solid black; padding: 5px; text-align: center"><?= $fetchCart["message"]; ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <th colspan="4" style="border: 1px solid black; padding: 5px; text-align: right">TOTAL</th>
                            <th colspan="1" style="border: 1px solid black; padding: 5px; text-align: left">&#8369;&nbsp;<?= number_format($sum, 2); ?></th>
                        </tfoot>
                    </table>

                </div>
            <?php
            } else {
            ?>
                <div class="noItem">
                    <p class="emptyCart">The message is empty!</p>

                </div>
            <?php
            }
            ?>
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

        <!--main.js-->
        <script src="../assets/js/index.js"></script>
        <script src="../assets/js/cart.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
       
         
    </body>

    </html>

<?php } else {
    // user is not logged in as admin, redirect to login page
    header("Location: login.php");
    exit();
}
?>


<script src="../../admin-pages/assets/js/dashmix.app.min-5.4.js"></script>
<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>