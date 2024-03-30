<?php
session_start();

include("../../db/recon.php");

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
    <title>User Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../orders.css">

    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

    <style>
    .nav-icons {
        background-color: transparent;
    }
    </style>

</head>

<body>
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
                                    <a class="dropdown-item" href="user_profile.php">
                                        <i class="far fa-fw fa-user me-1"></i> My Profile
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../user-pages/core/logout.php">
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

    <div class="side-nav" id="side-nav">
        <div class="sideNavTop">
            <div class="logo">
                <a href="../admin.php">
                    <img src="../admin-images/main_logo.png" alt="" class="logoImg">
                </a>
            </div>
        </div>

        <div class="sideNavMenu">
            <div class="sideNavButton">
                <div class="nav-icons"><a href="orders.php"><img src="../admin-images/shopping-bag (1).png" class="imgIcon">
                        <span style="font-size:10px;">Orders</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="users.php"><i class="fa-solid fa-users"></i>
                        <span style="font-size:10px;">Users</span>
                    </a></div>

            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="user_role.php"><i class="fa-solid fa-users"></i>
                        <span style="font-size:10px;">Role</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="pending_order.php"><img src="../admin-images/box.png" class="imgIcon">
                        <span style="font-size:10px;">Pending</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="received_order.php"><img src="../admin-images/box.png" class="imgIcon">
                        <span style="font-size:10px;">Received</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="categories.php"><img src="../admin-images/features.png" class="imgIcon">
                        <span style="font-size:10px;">Categories</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="products.php"><img src="../admin-images/features.png" class="imgIcon">
                        <span style="font-size:10px;">Products</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="variety.php"><img src="../admin-images/features.png" class="imgIcon">
                        <span style="font-size:10px;">Variety</span>
                    </a></div>
            </div>

            <div class="sideNavButton">
                <div class="nav-icons"><a href="user_profile.php"><i class="fa-solid fa-gear"></i>
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
            <h2>User Profile</h2>


        </div>


        <!-- start -->

        <div class="row" style="position: absolute; top: 15%; left: 0; width: 80%; margin-left: 10%; margin-right: 10%">

            <div class="col-lg-12 col-xl-12" style="background-color:rgb(242, 242, 242)">
                <form id="app_frm" action="../action/update_admin_profile.php" method="POST" autocomplete="off">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">First Name</label>
                            <input required value="<?php echo $_SESSION['firstname'] ?>" name="firstname" type="text" class="form-control form-control-alt">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Middle Name</label>
                            <input required value="<?php echo $_SESSION['middlename'] ?>" name="middlename" type="text" class="form-control form-control-alt">
                        </div>



                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input value="<?php echo $_SESSION['lastname'] ?>" name="lastname" type="text" class="form-control form-control-alt" required/>
                        </div>

                    </div>


                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Phone</label>
                            <input required value="<?php echo $_SESSION['contactNumber'] ?>" name="contactNumber" type="text" class="form-control form-control-alt">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Email</label>
                            <input required value="<?php echo $_SESSION['username'] ?>" name="username" type="email" class="form-control form-control-alt">

                            <input required value="<?php echo $_SESSION['id'] ?>" name="id" type="hidden" class="form-control form-control-alt">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Address</label>
                            <textarea required name="address" type="text" class="form-control form-control-alt"><?php echo $_SESSION['address'] ?> </textarea>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <select required name="sex" class="form-control form-control-alt">
                                <option <?php if ($_SESSION['sex']  == "Male") {
                                            print ' selected ';
                                        } ?> value="Male">Male</option>
                                <option <?php if ($_SESSION['sex'] == "Female") {
                                            print ' selected ';
                                        } ?> value="Female">Female</option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <input type="hidden" name="submit" value="1">
                                <button id="sub_btn" type="submit" class="btn  btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php require_once('../notif/check-reply.php'); ?>

            </div>
        </div>


        <!-- end -->



    </div>







</body>

</html>
<script src="../../admin-pages/admin.js"></script>
<script src="../../admin-pages/assets/js/dashmix.app.min-5.4.js"></script>