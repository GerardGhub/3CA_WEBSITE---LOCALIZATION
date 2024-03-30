<?php
session_start();
require_once('../../db/config.php');

if (isset($_POST['submit'])) {
    $product_name = $_POST['productName'];
    $status = $_POST['is_active'];
    $id = $_POST['id'];
    $order_movement_status = $_POST['order_movement_status'];

    try {
        $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM tocart_db WHERE productName = ? AND id != ?");
        $stmt->execute([$product_name, $id]);
        $result = $stmt->fetchAll();

        if (count($result) > 0) {
            $_SESSION['reply'] = array(array("danger", 'Product name "' . $category_name . '" is already in use. Please select another name.'));
            header("location:../core/received_order.php");
            exit(); // Terminate script execution after redirecting
        } else {
            $stmt = $conn->prepare("UPDATE tocart_db SET order_movement_status = ?, is_active = ? WHERE id = ?");
            $stmt->execute([$order_movement_status, $status, $id]);
            $_SESSION['reply'] = array(array("success", 'Order updated successfully.'));
            header("location:../core/received_order.php");
            exit(); // Terminate script execution after redirecting
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // Invalid request, redirect to users page
    header("location:../core/received_order.php");
    exit(); // Terminate script execution after redirecting
}
