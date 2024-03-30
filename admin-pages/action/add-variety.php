<?php
session_start();
require_once('../../db/config.php');


if (isset($_POST['product_id'],$_POST['variety'], $_FILES['image_path'], $_POST['is_active'])) {
    $product_id = $_POST['product_id'];
    $image_path = $_FILES['image_path'];
    $is_active = $_POST['is_active'];
    $added_by = $_SESSION['firstname'];
    $variety = $_POST['variety'];

    // Define the upload directory
    $uploadDir = '../../user-pages/main_img/';
    // // Generate a unique filename to avoid overwriting existing files
    // $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['image']['name']);

    // Extract the filename
    $filename = basename($_FILES['image_path']['name']);

    // Construct the full path including filename
    $uploadFile = $uploadDir . $filename;
    // Move the uploaded file to the specified directory
    move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile);
    try {
        $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with column names and placeholders
        $stmt = $conn->prepare("INSERT INTO variety (variety, variety_description,product_id,added_by,is_active, image_path) VALUES (?, ?, ?,?,?,?)");

        // Execute the statement with values
        $stmt->execute([$variety, $variety, $product_id, $added_by, $is_active,$filename]);

        $_SESSION['reply'] = array("success", 'Variety added successfully');
        header("location:../core/variety.php");
        exit; // Ensure script stops execution after redirection
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Required parameters are missing.";
}
