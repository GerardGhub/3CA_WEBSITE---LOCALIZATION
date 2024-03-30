<?php
    session_start();

    include("../../db/recon.php");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $referenceCode = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
    $referenceCode = substr($referenceCode, 0, 6);
    $currentDate = date("F j, Y");

    $sqlUpdateCart = "UPDATE tocart_db 
    SET reference='$referenceCode',
    date_ordered='$currentDate'
     WHERE reference='' AND userid={$_SESSION["userEmpID"]}";
    mysqli_query($conn, $sqlUpdateCart);

    $sqlShoppingCart = "SELECT * FROM tocart_db WHERE  userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
    $queryCart = mysqli_query($conn, $sqlShoppingCart);
    $rowCountCart = mysqli_num_rows($queryCart);

    $_SESSION["current_cart_count"] =  $rowCountCart;

    print "1";

    