<?php
session_start();
require_once('../../db/config.php');


// if ($res == 1 && $level == 0) {
if (isset($_GET['id'])) {
$id = $_GET['id'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("DELETE FROM form_db WHERE id = ?");
$stmt->execute([$id]);

$_SESSION['reply'] = array (array("success",'User deleted successfully'));
header("location:../core/users.php");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{
header("location:../core/users.php");
}
// }else{
// header("location:users.php");
// }
?>
