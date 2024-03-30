<?php
session_start();
require_once('../../db/config.php');


if (isset($_POST['category_name'], $_FILES['image'], $_POST['is_active'])) {
    $category_name = $_POST['category_name'];
    $image = $_FILES['image'];
    $is_active = $_POST['is_active'];
    $link = 'ceiling.php';
    $added_by = $_SESSION['firstname'];

    // Define the upload directory
    $uploadDir = '../../user-pages/main_img/';
    // // Generate a unique filename to avoid overwriting existing files
    // $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['image']['name']);

    // Extract the filename
    $filename = basename($_FILES['image']['name']);

    // Construct the full path including filename
    $uploadFile = $uploadDir . $filename;
 // Move the uploaded file to the specified directory
move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
    try {
        $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with column names and placeholders
        $stmt = $conn->prepare("INSERT INTO categories (category_name, image,link, is_active, added_by) VALUES (?, ?, ?,?,?)");

        // Execute the statement with values
        $stmt->execute([$category_name, $filename, $link, $is_active, $added_by]);

        $_SESSION['reply'] = array("success", 'Category added successfully');
        header("location:../core/categories.php");
        exit; // Ensure script stops execution after redirection
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


} else {
    echo "Error: Required parameters are missing.";
}
