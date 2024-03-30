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
            <h2>Variety</h2>
        </div>




        <div class="noItemContainer">
            <?php
            $sqlCart = "SELECT * FROM variety";
            $queryCart = mysqli_query($conn, $sqlCart);

            if (mysqli_num_rows($queryCart) != 0) {
            ?>
                <div style="position: absolute; top: 15%; left: 0; width: 80%; margin-left: 10%; margin-right: 10%">
                    <table id="example" class="table table-striped table-hover" style="width: 100%; text-align:center">
                        <thead>
                            <th style="border: 1px solid black; padding: 5px;">Id</th>
                            <th style="border: 1px solid black;">Variety</th>
                            <th style="border: 1px solid black;">Product</th>
                            <th style="border: 1px solid black;">Image</th>
                            <th style="border: 1px solid black;">Added&nbsp;By</th>
                            <th style="border: 1px solid black;">Date&nbsp;Added</th>
                            <th style="border: 1px solid black;">Status</th>
                            <th style="border: 1px solid black;">Action</th>
                        </thead>
                        <tbody>
                            <?php

                            $sqlCart = "SELECT 
                            VAR.id,VAR.variety,VAR.image_path,VAR.added_by,VAR.date_added,
                            VAR.is_active, PROD.product_name
                           FROM variety VAR
                          INNER JOIN tbl_products PROD ON VAR.product_id = PROD.id

                          ";
                            $queryCart = mysqli_query($conn, $sqlCart);
                            while ($fetchCart = mysqli_fetch_array($queryCart)) {

                            ?>
                                <tr>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["id"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["variety"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["product_name"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;">
                                    
                                    <img src="../../user-pages/main_img/<?= $fetchCart["image_path"]; ?>" height="70" width="100"></img></td>
                              
            
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
                                            '<?php echo $fetchCart['variety']; ?>',
                                            '<?php echo $fetchCart['image_path']; ?>',
                                       
                        
                                             '<?php echo $fetchCart['is_active']; ?>',
                                         
                                          
                                     
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
            <form id="app_frm3" action="../action/update-variety.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="modal-header">
        <h5 class="modal-title">Edit Variety</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pb-1">
        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">Variety Name</label>
            <div class="col-sm-8">
                <input id="variety" name="variety" required type="text" class="form-control form-control-alt" placeholder="Enter variety name">
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">Image</label>
            <div class="col-sm-8">
                <input id="img" name="image_path" type="file" class="form-control form-control-alt" onchange="previewImage(event)">
                <img id="preview" src="#" alt="Preview" style="max-width: 100px; max-height: 100px;">
                <p></p>
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
 



    <div class="modal fade" id="modal-add" role="dialog" aria-labelledby="modal-default-fadein2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form id="app_frm30" action="../action/add-variety.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="modal-header">
        <h5 class="modal-title">Add Variety</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pb-1">

    <?php

                        // Fetch user roles from the database
                        $sql = "SELECT * FROM tbl_products where is_active = 1";
                        $result = mysqli_query($conn, $sql);
                        ?>

<div class="row mb-2">
    <label class="col-sm-4 col-form-label">Product</label>
    <div class="col-sm-8">
        <select name="product_id" required class="form-control form-control-alt">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <?php $selected = ($row['id']) ? 'selected' : ''; ?>
                    <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['product_name'] ?></option>
                <?php } ?>
            <?php } else { ?>
                <option disabled>No products found</option>
            <?php } ?>
        </select>
    </div>
</div>




        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">Variety Name</label>
            <div class="col-sm-8">
                <input name="variety" required type="text" class="form-control form-control-alt" placeholder="Enter variety name">
            </div>
        </div>


     

        <div class="row mb-2">
            <label class="col-sm-4 col-form-label">Image</label>
            <div class="col-sm-8">
                <input id="img" name="image_path" required type="file" class="form-control form-control-alt">

                <p></p>
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
    function set_user(id, variety, image, status ) {
     
        document.getElementById('id').value = id;
        document.getElementById('variety').value = variety;
        // document.getElementById('image_path').value = imgpath;
        document.getElementById('is_active').value = status;

        document.getElementById('preview').value = image;

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



<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]); // Read the file as a data URL
        }
    }
</script>