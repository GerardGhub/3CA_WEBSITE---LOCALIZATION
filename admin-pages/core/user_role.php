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
            <h2>User Role</h2>


        </div>




        <div class="noItemContainer">
            <?php
            $sqlCart = "SELECT * FROM user_roles";
            $queryCart = mysqli_query($conn, $sqlCart);

            if (mysqli_num_rows($queryCart) != 0) {
            ?>
                <div style="position: absolute; top: 15%; left: 0; width: 80%; margin-left: 10%; margin-right: 10%">
                    <table id="example" class="table table-striped table-hover" style="width: 100%; text-align:center">
                        <thead style="text-align: center;">
                            <th style="border: 1px solid black; padding: 5px;">Id</th>
                            <th style="border: 1px solid black;">Role</th>
                            <th style="border: 1px solid black;">Date Added</th>
                            <th style="border: 1px solid black;">Added By</th>

                            <th style="border: 1px solid black;">Status</th>
                            <th style="border: 1px solid black;">Action</th>
                        </thead>
                        <tbody>
                            <?php

                            $sqlCart = "SELECT * FROM user_roles";
                            $queryCart = mysqli_query($conn, $sqlCart);
                            while ($fetchCart = mysqli_fetch_array($queryCart)) {
                                // $sum = $sum + $fetchCart["price"];
                            ?>
                                <tr>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["Id"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["Role"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["DateAdded"]; ?></td>
                                    <td style="border: 1px solid black; padding: 5px;"><?= $fetchCart["AddedBy"]; ?></td>

                                    <td style="border: 1px solid black; padding: 5px;" class=" text-center">
                                        <?php
                                        switch ($fetchCart["IsActive"]) {
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
                                            <button onclick="set_user('<?php echo $fetchCart['Id']; ?>',
                                            '<?php echo $fetchCart['Role']; ?>',
                                            '<?php echo $fetchCart['DateAdded']; ?>',
                                    
                                            '<?php echo $fetchCart['IsActive']; ?>',
                             
                                            );" type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modal-default-fadein2" data-bs-keyboard="false" data-bs-backdrop="static" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>

                                            <button onclick="set_user('<?php echo $fetchCart['Id']; ?>',
                                            '<?php echo $fetchCart['Role']; ?>',
                                            '<?php echo $fetchCart['DateAdded']; ?>',
                                    
                                            '<?php echo $fetchCart['IsActive']; ?>',
                             
                                            );" type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modal-default-fadein2" data-bs-keyboard="false" data-bs-backdrop="static" title="Add">
                                                <i class="fa fa-add"></i>
                                            </button>


                                            <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" title="Delete" onclick="return confirm('Are you sure you want to delete <?= $fetchCart['Role']; ?>?');" href="action/drop-user.php?id=<?= $fetchCart['Id']; ?>">
                                                <i class="fa fa-trash-can"></i>
                                            </a>
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
    <!-- 
    <div class="modal fade" id="modal-default-fadein2" role="dialog" aria-labelledby="modal-default-fadein2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="app_frm3" action="action/update-user.php" method="POST" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-1">
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">
                                <input id="firstname" name="firstname" required type="text" class="form-control form-control-alt" placeholder="Enter first name" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Middle Name</label>
                            <div class="col-sm-8">
                                <input id="middlename" name="middlename" required type="text" class="form-control form-control-alt" placeholder="Enter middle name" disabled>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                                <input id="lastname" name="lastname" required type="text" class="form-control form-control-alt" placeholder="Enter last name" disabled>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input id="email" name="username" required type="email" class="form-control form-control-alt" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <select id="gender" name="sex" required class="form-control form-control-alt">
                                    <option selected disabled value="">Choose</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="number" id="contactNumber" name="contactNumber" required pattern="\d{11}" title="Phone number must be 11 digits long" class="form-control form-control-alt" placeholder="Enter mobile phone">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <textarea id="address" name="address" required rows="4" class="form-control form-control-alt" placeholder="Enter Address"></textarea>
                            </div>
                        </div>



                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select id="status" name="IsActive" required class="form-control form-control-alt">
                                    <option selected disabled value="">Choose</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>




                        <?php
                        // Retrieve the userType for the currently selected user
                        $userType = ''; // Set a default value
                        if (isset($_SESSION['userType'])) {
                            $userType = $_SESSION['userType'];
                        }

                        // Fetch user roles from the database
                        $sql = "SELECT * FROM user_roles";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">User Role</label>
                            <div class="col-sm-8">
                                <select id="role" name="userType" required class="form-control form-control-alt">
                                    <?php if (mysqli_num_rows($result) > 0) { ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <?php $selected = ($row['Role'] == $userType) ? 'selected' : ''; ?>
                                            <option value="<?= $row['Role'] ?>" <?= $selected ?>><?= $row['Role'] ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option disabled>No roles found</option>
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
    </div> -->




</body>

</html>
<script src="admin.js"></script>
<script src="../assets/js/dashmix.app.min-5.4.js"></script>
<script>
    function set_user(id, role, status) {
        document.getElementById('Id').value = id;
        document.getElementById('Role').value = role;
        document.getElementById('status').value = status;

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