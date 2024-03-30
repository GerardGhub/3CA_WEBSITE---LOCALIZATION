<?php
session_start();
require_once('../../db/config.php');



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);

        $_SESSION['reply'] = array(array("success", 'Category deleted successfully'));
        header("location:../core/categories.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    header("location:../core/categories.php");
}
