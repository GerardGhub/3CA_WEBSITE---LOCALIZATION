<?php
session_start();
require_once('../../db/config.php');

if (isset($_POST['submit'])) {

$product_name = $_POST['product_name'];
$unit_cost = $_POST['unit_cost'];
$is_active = $_POST['is_active'];
$category_id = $_POST['category_id'];
$id = $_POST['id'];


try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_products WHERE product_name = ? AND id != ?");
$stmt->execute([$product_name, $id]);
$result = $stmt->fetchAll();


if (count($result) > 0) {
$_SESSION['reply'] = array (array("danger",'Product "'.$product_name.'" is used, please select another email'));
header("location:../core/products.php");
}else{
$stmt = $conn->prepare("UPDATE tbl_products SET product_name = ?, unit_cost = ?, is_active = ?, category_id = ? WHERE id = ?");
$stmt->execute([$product_name, $unit_cost, $is_active, $category_id, $id]);
$_SESSION['reply'] = array (array("success",'Product '.$product_name.' updated successfully'));
header("location:../core/products.php");
}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{
header("location:../core/products.php");
}
?>
