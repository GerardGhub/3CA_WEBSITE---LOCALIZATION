<?php
    session_start();

    include("../../db/recon.php");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productVariety = $_POST["productVariety"];
    $productQty = $_POST["productQuantity"];

    $sqlVerify = "SELECT * FROM tocart_db WHERE productName='$productName' AND variety='$productVariety' AND userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
    $queryVerify = mysqli_query($conn, $sqlVerify);
    $rowCount = mysqli_num_rows($queryVerify);

    if ($rowCount == 0) {

        $addProductAndSelectedQty = $productPrice * $productQty;

        $sqlInsertToCart = "INSERT INTO tocart_db() VALUES(NULL, '', '$productName', '', '$productVariety', '$productQty', '$productPrice', '$addProductAndSelectedQty', '{$_SESSION["userEmpID"]}', '',1,'','CART','')";
        mysqli_query($conn, $sqlInsertToCart);

        
     $sqlShoppingCart = "SELECT * FROM tocart_db WHERE  userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
     $queryCart = mysqli_query($conn, $sqlShoppingCart);
     $rowCountCart = mysqli_num_rows($queryCart);
 
     $_SESSION["current_cart_count"] =  $rowCountCart;

        
    } else {

        $updateOrder = $productPrice * $productQty;

        $sqlInsertUpdateCart = "UPDATE tocart_db 
        SET quantity=(quantity + $productQty), 
        price = (quantity)*unitcost
        WHERE productName='$productName' AND userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
        mysqli_query($conn, $sqlInsertUpdateCart);
 
        $sqlShoppingCart = "SELECT * FROM tocart_db WHERE  userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
        $queryCart = mysqli_query($conn, $sqlShoppingCart);
        $rowCountCart = mysqli_num_rows($queryCart);
    
        $_SESSION["current_cart_count"] =  $rowCountCart;
        
    }

  

    print "1";