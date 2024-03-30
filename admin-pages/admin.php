<?php
session_start();

include("../db/recon.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if user is logged in as regular user
if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'user')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- main admin css -->
    <link rel="stylesheet" href="admin.css">
    <!-- order css -->
    <link rel="stylesheet" href="orders.css">
    <title>Orders</title>

    <style>
    .nav-icons {
        background-color: transparent;
    }
    </style>
</head>

<body>

    <!-- header ----------------------------------------------------------------------------------------- -->
    <header>
        <div class="horizontal-nav">
            <div class="header">
                <div class="adminName">
                    <!-- ADMIN DASHBOARD -->
                    <div class="space-x-1">
                        <div class="dropdown d-inline-block">

                            <button style="background-color:rgb(255, 200, 82);" type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/<?php echo $gender; ?>.png" alt="">
                                <span class="d-none d-sm-inline-block"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></span>
                                <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="p-2">
                                    <a class="dropdown-item" href="core/user_profile.php">
                                        <i class="far fa-fw fa-user me-1"></i> My Profile
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../user-pages/core/logout.php">
                                        <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- side nav --------------------------------------------------------------------------------------- -->

    <div class="side-nav" id="side-nav">
        <div class="sideNavTop">
            <div class="logo">
                <a href="admin.php">
                    <img src="admin-images/main_logo.png" alt="" class="logoImg">
                </a>
            </div>
        </div>

        <div class="sideNavMenu">
            <div class="sideNavButton">
                <div class="nav-icons" >
                    <a href="core/orders.php"><img src="admin-images/shopping-bag (1).png" class="imgIcon">
                        <span style="font-size:10px;">Orders</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/users.php"><i class="fa-solid fa-users"></i>
                        <span style="font-size:10px;">Users</span>
                    </a></div>

            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/user_role.php"><i class="fa-solid fa-users"></i>
                        <span style="font-size:10px;">Role</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/pending_order.php"><img src="admin-images/box.png" class="imgIcon">
                        <span style="font-size:10px;">Pending</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/received_order.php"><img src="admin-images/box.png" class="imgIcon">
                        <span style="font-size:10px;">Received</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/categories.php"><img src="admin-images/features.png" class="imgIcon">
                        <span style="font-size:10px;">Categories</span>
                    </a></div>
            </div>


            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/products.php"><img src="admin-images/features.png" class="imgIcon">
                        <span style="font-size:10px;">Products</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/variety.php"><img src="admin-images/features.png" class="imgIcon">
                        <span style="font-size:10px;">Variety</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="core/user_profile.php"><i class="fa-solid fa-gear"></i>
                        <span style="font-size:10px;">Settings</span>
                    </a></div>
            </div>
        </div>
    </div>

    <div class="sideNavLink" id="sideNavLink">
        <div class="navLink" style="background-color: rgb(222, 222, 222);">
            <a class="Link" href="admin.html">Orders</a>
        </div>

        <div class="navLink">
            <a class="Link" href="users.php">User/Customers</a>
        </div>

        <div class="navLink">
            <a class="Link" href="core/user_role.php">User Role</a>
        </div>

        <div class="navLink">
            <a class="Link" href="pending.html">Pending</a>
        </div>

        <div class="navLink">
            <a class="Link" href="products.html">Products</a>
        </div>

        <div class="navLink">
            <a class="Link" href="settings.html">Settings</a>
        </div>

        <div class="toggleNav" id="toggleNav">
            <i class="fa-solid fa-chevron-right" id="toggleIcon"></i>
        </div>
    </div>

    <div class="adminContainer">

        <div style="position: absolute; top: 11%; left: 0; width: 80%; margin-left: 10%; margin-right: 10%">
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <div class="flex-shrink-0">
                    <i class="fa fa-fw fa-info-circle"></i>
                </div>

                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">Welcome to admin panel <?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></p>
                </div>

            </div>

            <!-- start -->

            <div class="row">
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="#">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-users fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">

                                    <?php
                                    // Query to count total users
                                    $sql = "SELECT COUNT(*) AS total_users FROM form_db";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total_users'];
                                    ?>

                                </div>
                                <div class="text-muted">Total Users</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="#">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-user-tag fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">

                                    <?php

                                    $sql = "SELECT COUNT(*) AS user_roles FROM user_roles";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['user_roles'];
                                    ?>


                                </div>
                                <div class="text-muted">User Roles</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="#">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-person-chalkboard fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">

                                    <?php
                                    $sql = "SELECT COUNT(*) AS total FROM tocart_db
WHERE is_active = 1 AND order_movement_status='RECEIVED'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'];
                                    ?>


                                </div>
                                <div class="text-muted">Order Received</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="admin?page=denied_applications">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-truck fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">12</div>
                                <div class="text-muted">Pending Order</div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- end>


            <!-- start -->



            <div class="row" style="margin-top:10px;">
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="admin?page=tickets">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa fa-file fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">
                                    <?php
                                    // Query to count total users
                                    $sql = "SELECT COUNT(*) AS total_products FROM tbl_products
                                    WHERE is_active = 1 AND category_id = 1";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total_products'];
                                    ?>

                                </div>
                                <div class="text-muted">Floorings</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="admin?page=pending_tickets">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-shop fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">
                                    <?php
                                    // Query to count total users
                                    $sql = "SELECT COUNT(*) AS total_products FROM tbl_products
                                    WHERE is_active = 1 AND category_id = 3";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total_products'];
                                    ?>



                                </div>
                                <div class="text-muted">Wallings</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="admin?page=active_tickets">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-shop fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">
                                    <?php

                                    $sql = "SELECT COUNT(*) AS total_products FROM tbl_products
                                    WHERE is_active = 1 AND category_id = 2";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total_products'];
                                    ?>


                                </div>
                                <div class="text-muted">Ceilings</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="background-color: azure; border: solid skyblue 1px;">
                    <a class="block block-rounded block-link-shadow" href="core/categories.php">
                        <div class="block-content block-content-full">
                            <div class="py-4 text-center">
                                <div class="mb-3">
                                    <i class="fa-solid fa-warehouse fa-3x text-primary"></i>
                                </div>
                                <div class="fs-4 ">
                                    <?php
                                    // Query to count total users
                                    $sql = "SELECT COUNT(*) AS total_categories FROM categories";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total_categories'];
                                    ?>


                                </div>
                                <div class="text-muted">Category</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- end -->


            <?php
            // Calculate total sale of products
            $sql = "SELECT SUM(price) AS total_sale FROM tocart_db";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total_sale = $row['total_sale'];
            ?>

      




            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Top 10 Products by Sales  </h5>

                            <span class="text-end">
                            <div class="text-muted">Total Sale:
                            <?php echo $total_sale; ?>
                            
                            </div>

                            </span>

</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Total Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    $sql = "SELECT SUM(CART.price) AS total_sales,PROD.product_name as product_name 
                                    FROM tocart_db CART
                                    INNER JOIN tbl_products PROD ON CART.productName = PROD.product_name
                                    WHERE order_movement_status='RECEIVED'
                                    GROUP BY PROD.product_name
                                    ORDER BY total_sales DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $counter . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['total_sales'] . "</td>";
                                        echo "</tr>";
                                        $counter++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>





    </div>



    </div>




    <script src="admin.js"></script>
</body>

</html>