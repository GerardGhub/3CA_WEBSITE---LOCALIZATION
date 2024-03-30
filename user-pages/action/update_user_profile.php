<?php
session_start();
require_once('../../db/config.php');


if (isset($_POST['submit'])) {
$firstname = ucwords($_POST['firstname']);
$middlename = ucwords($_POST['middlename']);
$lastname = ucwords($_POST['lastname']);
$sex = $_POST['sex'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['username'];
$address = $_POST['address'];
$id = $_POST['id'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT username FROM form_db WHERE username = ? AND id != ?");
$stmt->execute([$email, $id]);
$result = $stmt->fetchAll();

if (count($result) > 0) {
$_SESSION['retain'] = $_POST;
$_SESSION['reply'] = array (array("danger","Email is already registred"));
header("location:../core/user_profile.php");
}else{

$stmt = $conn->prepare("UPDATE form_db SET firstname = ?, lastname = ?, middlename = ?, sex = ?, contactNumber = ?, username = ? WHERE id = ?");
$stmt->execute([$firstname, $lastname, $middlename, $sex, $contactNumber, $email, $id]);

$_SESSION["firstname"] = $firstname;
$_SESSION["lastname"] = $lastname;
$_SESSION["sex"] = $sex;
$_SESSION["address"] = $address;
$_SESSION["contactNumber"] = $contactNumber;
$_SESSION["username"] = $email;
$_SESSION["middlename"] = $middlename;


$_SESSION['reply'] = array (array("success","Profile updated successfully"));
header("location:../core/user_profile.php");

}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{
header("location:../?page=dashboard");
}
?>
