<?php
session_start();
require_once('../../db/config.php');

if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $status = $_POST['is_active'];
    $id = $_POST['id'];

    // Check if a file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
     
        // Define the upload directory
        $uploadDir = '../../user-pages/main_img/';
        // // Generate a unique filename to avoid overwriting existing files
        // $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['image']['name']);

        // Extract the filename
        $filename = basename($_FILES['image']['name']);

          // Construct the full path including filename
          $uploadFile = $uploadDir . $filename;


        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // File uploaded successfully, proceed with database update

            try {
                $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM categories WHERE category_name = ? AND id != ?");
                $stmt->execute([$category_name, $id]);
                $result = $stmt->fetchAll();

                if (count($result) > 0) {
                    $_SESSION['reply'] = array(array("danger", 'Category name "' . $category_name . '" is already in use. Please select another name.'));
                    header("location:../core/categories.php");
                    exit(); // Terminate script execution after redirecting
                } else {
                    $stmt = $conn->prepare("UPDATE categories SET category_name = ?, image = ?, is_active = ? WHERE id = ?");
                    $stmt->execute([$category_name, $filename, $status, $id]);
                    $_SESSION['reply'] = array(array("success", 'Category "' . $category_name . '" updated successfully.'));
                    header("location:../core/categories.php");
                    exit(); // Terminate script execution after redirecting
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } else {
            // Failed to move uploaded file
            $_SESSION['reply'] = array(array("danger", 'Failed to move uploaded file.'));
            header("location:../core/categories.php");
            exit(); // Terminate script execution after redirecting
        }
    } else {
        // No file uploaded or an error occurred
        $_SESSION['reply'] = array(array("danger", 'No file uploaded or an error occurred.'));
        header("location:../core/categories.php");
        exit(); // Terminate script execution after redirecting
    }
} else {
    // Invalid request, redirect to users page
    header("location:../core/users.php");
    exit(); // Terminate script execution after redirecting
}
