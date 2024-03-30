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
    <title>Orders</title>
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


                    <!-- 
    ADMIN DASHBOARD
  -->





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
            <h2>Products</h2>
        </div>




        <div class="noItemContainer">
            <?php
            $sqlCart = "SELECT * FROM tbl_products";
            $queryCart = mysqli_query($conn, $sqlCart);

            if (mysqli_num_rows($queryCart) != 0) {
            ?>
                <div style="position: absolute; top: 15%; left: 0; width: 80%; margin-left: 10%; margin-right: 10%">
                    <table id="example" class="table table-striped table-hover" style="width: 100%; text-align:center">
                        <thead>
                            <th style="border: 1px solid black; padding: 5px;">Id</th>
                            <th style="border: 1px solid black;">Product&nbsp;Name</th>
                            <th style="border: 1px solid black;">Category&nbsp;Name</th>
                            <!-- <th style="border: 1px solid black;">Image</th> -->
                            <th style="border: 1px solid black;">Total&nbsp;Variety</th>

                            <th style="border: 1px solid black;">Unit&nbsp;Cost</th>
                            <th style="border: 1px solid black;">Added&nbsp;By</th>
                            <th style="border: 1px solid black;">Date&nbsp;Added</th>
                            <th style="border: 1px solid black;">Status</th>
                            <th style="border: 1px solid black;">Action</th>
                        </thead>
                        <tbody>
                            <?php

                            $sqlCart = "SELECT 
                            PROD.id, PROD.image, 
                            PROD.product_name, PROD.variety, 
                            PROD.quantity, PROD.unit_cost, 
                            PROD.added_by,PROD.date_added,PROD.is_active,
                             CAT.category_name,
                             PROD.category_id
                           FROM tbl_products PROD
                          INNER JOIN categories CAT ON PROD.category_id = CAT.id
                          ";
                            $queryCart = mysqli_query($conn, $sqlCart);
                            while ($fetchCart = mysqli_fetch_array($queryCart)) {

                            ?>
                                <tr>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["id"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["product_name"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["category_name"]; ?></td>
                                    <!-- <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["image"]; ?></td> -->
                                    <td style="border: 1px solid black; padding: 5px;">
                                        <?php
                                        // Query to count total users
                                        $sql = "SELECT COUNT(*) AS total FROM variety WHERE product_id = {$fetchCart['id']} ";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total'];
                                        ?>

                                    </td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["unit_cost"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["added_by"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["date_added"]; ?></td>

                                    <td style="border: 1px solid black; padding: 5px;" class=" text-center">
                                        <?php
                                        switch ($fetchCart["is_active"]) {
                                            case '1':
                                        ?><span class="badge bg-success">Active</span><?php
                                                                                        break;

                                                                                    default:
                                                                                        ?><span class="badge bg-danger">Inactive</span><?php
                                                                                                                                }
                                                                                                                                        ?>
                                    </td>


                                    <td style="border: 1px solid black; padding: 5px;" class="text-center">

                                        <div class="btn-group">

                                            <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modal-add" data-bs-keyboard="false" data-bs-backdrop="static">
                                                <i class="fa fa-plus"></i>
                                            </button>


                                            <button onclick="set_user('<?php echo $fetchCart['id']; ?>',
                                            '<?php echo $fetchCart['product_name']; ?>',
                                            '<?php echo $fetchCart['unit_cost']; ?>',
                                            '<?php echo $fetchCart['is_active']; ?>',
            
                                            '<?php echo $fetchCart['category_id']; ?>',
                                         
                                     
                                            );" type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modal-default-fadein2" data-bs-keyboard="false" data-bs-backdrop="static">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>

                                        </div>
                                    </td>


                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                    <?php require_once('../notif/check-reply.php'); ?>
                </div>
            <?php
            } else {
            ?>
                <div class="noItem">
                    <p class="emptyCart">The dataTable is empty!</p>

                </div>
            <?php
            }
            ?>
        </div>

    </div>


    <!--
 THIS IS FOR MODAL
 -->

    <div class="modal fade" id="modal-default-fadein2" role="dialog" aria-labelledby="modal-default-fadein2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="app_frm3" action="../action/update-product.php" method="POST" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-1">
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Product Name</label>
                            <div class="col-sm-8">
                                <input id="product_name" name="product_name" required type="text" class="form-control form-control-alt" placeholder="Enter product name">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Unit Cost</label>
                            <div class="col-sm-8">
                                <input id="unit_cost" name="unit_cost" required type="text" class="form-control form-control-alt" placeholder="Enter unit cost">
                            </div>
                        </div>




                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select id="is_active" name="is_active" required class="form-control form-control-alt">
                                    <option selected disabled value="">Choose</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>




                        <?php
                        // Retrieve the userType for the currently selected user


                        // Fetch user roles from the database
                        $sql = "SELECT * FROM categories where is_active = 1";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select id="category_id" name="category_id" required class="form-control form-control-alt">
                                    <?php if (mysqli_num_rows($result) > 0) { ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <?php $selected = ($row['id']) ? 'selected' : ''; ?>
                                            <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['category_name'] ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option disabled>No categories found</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>




                    </div>
                    <input type="hidden" name="submit" value="1">
                    <input id="id" type="hidden" name="id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="sub_btn3" type="submit" class="btn  btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-add" role="dialog" aria-labelledby="modal-default-fadein2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="app_frm3" action="../action/add-product.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-1">


                        <?php
                        // Retrieve the userType for the currently selected user


                        // Fetch user roles from the database
                        $sql = "SELECT * FROM categories where is_active = 1";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select name="category_id" required class="form-control form-control-alt">
                                    <?php if (mysqli_num_rows($result) > 0) { ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <?php $selected = ($row['id']) ? 'selected' : ''; ?>
                                            <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['category_name'] ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option disabled>No categories found</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>



                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Product Name</label>
                            <div class="col-sm-8">
                                <input name="product_name" required type="text" class="form-control form-control-alt" placeholder="Enter product name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Unit Cost</label>
                            <div class="col-sm-8">
                                <input name="unit_cost" required type="number" min="0" class="form-control form-control-alt" placeholder="Enter unit cost">
                            </div>
                        </div>





                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select name="is_active" required class="form-control form-control-alt">
                                    <option selected disabled value="">Choose</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="submit" value="1">
                    <input id="id" type="hidden" name="id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="sub_btn3" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




</body>

</html>
<script src="../admin.js"></script>
<script src="../assets/js/dashmix.app.min-5.4.js"></script>
<script>
    function set_user(id, pname, ucost, status, categoryid) {
        
        document.getElementById('id').value = id;
        document.getElementById('product_name').value = pname;
        document.getElementById('unit_cost').value = ucost;
        document.getElementById('is_active').value = status;
        document.getElementById('category_id').value = categoryid;



    }

    function set_image() {

        var imageUrl = "../../user-pages/main_img/" + image; // Replace this with the URL of your image
        var preview = document.getElementById('preview');

        preview.src = imageUrl; // Set the src attribute of the img element to the image URL
        preview.style.display = 'block'; // Make sure the img element is displayed

    }
</script>

<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>

<!-- initialize the DataTable in the jQuery document ready function. -->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            //disable sorting on last column
            "columnDefs": [{
                "orderable": false,
                "targets": 5
            }],
            language: {
                //customize pagination prev and next buttons: use arrows instead of words
                'paginate': {
                    'previous': '<span class="fa fa-chevron-left"></span>',
                    'next': '<span class="fa fa-chevron-right"></span>'
                },
                //customize number of elements to be displayed
                "lengthMenu": 'Display <select class="form-control input-sm">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> results'
            }
        })
    });


    // JavaScript validation to restrict input to numeric characters
    document.getElementById('contactNumber').addEventListener('input', function(e) {
        let input = e.target.value;
        // Remove non-numeric characters
        input = input.replace(/\D/g, '');
        // Restrict to 11 digits
        if (input.length > 11) {
            input = input.slice(0, 11);
        }
        e.target.value = input;
    });
</script>