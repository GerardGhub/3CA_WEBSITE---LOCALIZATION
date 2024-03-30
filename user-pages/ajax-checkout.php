<?php
    session_start();

    // Connect to your database (Replace with your database credentials)
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "user_db";

    $conn = new mysqli($host, $user, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productVariety = $_POST["productVariety"];

    $sqlVerify = "SELECT * FROM tocart_db WHERE productName='$productName' AND userid='{$_SESSION["userEmpID"]}' AND reference=''";
    $queryVerify = mysqli_query($conn, $sqlVerify);
    $rowCount = mysqli_num_rows($queryVerify);

    if ($rowCount == 0) {
        $sqlInsertToCart = "INSERT INTO tocart_db() VALUES(NULL, '', '$productName', '', '$productVariety', '1', '$productPrice', '{$_SESSION["userEmpID"]}', '')";
        mysqli_query($conn, $sqlInsertToCart);
    } else {
        $sqlInsertUpdateCart = "UPDATE tocart_db SET quantity=(quantity + 1), price=(price + $productPrice) WHERE productName='$productName' AND userid='{$_SESSION["userEmpID"]}' AND reference=''";
        mysqli_query($conn, $sqlInsertUpdateCart);
    }

    print "1";