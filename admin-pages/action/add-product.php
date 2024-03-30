<?php
session_start();
require_once('../../db/config.php');

if (isset($_POST['category_id'], $_POST['product_name'], $_POST['is_active'], $_POST['unit_cost'])) {
    $category_id = $_POST['category_id'];
    $is_active = $_POST['is_active'];
    $added_by = $_SESSION['firstname'];
    $unit_cost = $_POST['unit_cost'];
    $product_name = $_POST['product_name'];

    try {
        $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with column names and placeholders
        $stmt = $conn->prepare("INSERT INTO tbl_products (category_id, product_name, added_by, image, is_active,unit_cost) VALUES (?, ?, ?, ?, ?, ?)");

        // Execute the statement with values
        $stmt->execute([$category_id,$product_name, $added_by, $product_name, $is_active, $unit_cost]);

        $_SESSION['reply'] = array("success", 'Product added successfully');
        header("location:../core/products.php");
        exit; // Ensure script stops execution after redirection
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Required parameters are missing.";
}
?>
