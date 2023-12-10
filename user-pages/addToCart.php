<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "cart_db";

$conn = mysqli_connect($host, $user, $password, $db);

if(isset($_POST('addTo-Cart'))) {
    $image = $_POST['image'];
    $productName = $_POST['productName'];
    $productSubName = $_POST['productSubName'];
    $variety = $_POST['variety'];
    $price = $_POST['price'];


    $sql = "INSERT INTO `tocart_db`( `image`, `productName`, `productSubName`, `variety`, `quantity`, `price`) 
    VALUES (' $image', '$productName', ' $productSubName', ' $variety', 1 ,' $price')";

}
?>