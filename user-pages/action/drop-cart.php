<?php
session_start();
require_once('../../db/config.php');

// Connect to your database (Replace with your database credentials)
$host = "localhost";
$user = "root";
$password = "";
$db = "user_db";

$data = new mysqli($host, $user, $password, $db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $conn = new PDO('mysql:host=' . DBHost . ';dbname=' . DBName . ';charset=' . DBCharset . ';collation=' . DBCollation . ';prefix=' . DBPrefix . '', DBUser, DBPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE tocart_db SET is_active = 0 WHERE id = ?");
        $stmt->execute([$id]);

        $_SESSION['reply'] = array(array("success", 'Cart deleted successfully'));


        $sqlShoppingCart = "SELECT * FROM tocart_db WHERE  userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
        $queryCart = mysqli_query($data, $sqlShoppingCart);
        $rowCountCart = mysqli_num_rows($queryCart);

        $_SESSION["current_cart_count"] =  $rowCountCart;


        header("location:../core/cart.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    header("location:../core/cart.php");
}
