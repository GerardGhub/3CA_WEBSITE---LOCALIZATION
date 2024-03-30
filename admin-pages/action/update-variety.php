<?php
session_start();
require_once('../../db/config.php');

if (isset($_POST['submit'])) {
    $variety = $_POST['variety'];
    $status = $_POST['is_active'];
    $id = $_POST['id'];
    $image_path = $_FILES['image_path'];

    // Check if a file is uploaded
    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
     
        // Define the upload directory
        $uploadDir = '../../user-pages/main_img/';
        // // Generate a unique filename to avoid overwriting existing files
        // $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['image']['name']);

        // Extract the filename
        $filename = basename($_FILES['image_path']['name']);

          // Construct the full path including filename
          $uploadFile = $uploadDir . $filename;


        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile)) {
            // File uploaded successfully, proceed with database update

            try {
                $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM variety WHERE variety = ? AND id != ?");
                $stmt->execute([$variety, $id]);
                $result = $stmt->fetchAll();

                if (count($result) > 0) {
                    $_SESSION['reply'] = array(array("danger", 'Variety "' . $variety . '" is already in use. Please select another name.'));
                    header("location:../core/variety.php");
                    exit(); // Terminate script execution after redirecting
                } else {
                    $stmt = $conn->prepare("UPDATE variety SET variety = ?, image_path = ?, is_active = ? WHERE id = ?");
                    $stmt->execute([$variety, $filename, $status, $id]);
                    $_SESSION['reply'] = array(array("success", 'Variety "' . $variety . '" updated successfully.'));
                    header("location:../core/variety.php");
                    exit(); // Terminate script execution after redirecting
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } else {
            // Failed to move uploaded file
            $_SESSION['reply'] = array(array("danger", 'Failed to move uploaded file.'));
            header("location:../core/variety.php");
            exit(); // Terminate script execution after redirecting
        }
    } else {
        // No file uploaded or an error occurred
        $_SESSION['reply'] = array(array("danger", 'No file uploaded or an error occurred.'));
        header("location:../core/variety.php");
        exit(); // Terminate script execution after redirecting
    }
} else {
    // Invalid request, redirect to users page
    header("location:../core/variety.php");
    exit(); // Terminate script execution after redirecting
}
