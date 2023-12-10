<?php 

session_start();
session_destroy();

header("location:/user-pages/index.html");
exit();

?>

