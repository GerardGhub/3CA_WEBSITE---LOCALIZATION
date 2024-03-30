<?php
session_start();
require_once('../../db/config.php');

if (isset($_POST['submit'])) {

$email = $_POST['username'];
$sex = $_POST['sex'];
$contactNumber = $_POST['contactNumber'];
$status = $_POST['IsActive'];
$address = $_POST['address'];
$userType = $_POST['userType'];
$id = $_POST['id'];


try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM form_db WHERE username = ? AND id != ?");
$stmt->execute([$email, $id]);
$result = $stmt->fetchAll();


if (count($result) > 0) {
$_SESSION['reply'] = array (array("danger",'Email "'.$email.'" is used, please select another email'));
header("location:../core/users.php");
}else{
$stmt = $conn->prepare("UPDATE form_db SET username = ?, sex = ?, contactNumber = ?, address = ?, userType = ?, IsActive = ? WHERE id = ?");
$stmt->execute([$email, $sex, $contactNumber, $address, $userType, $status, $id]);
$_SESSION['reply'] = array (array("success",'User '.$email.' updated successfully'));
header("location:../core/users.php");
}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{
header("location:../core/users.php");
}
?>
