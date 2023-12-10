<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "user_db";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['signIn'])) {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];

    $sql = "INSERT INTO form_db (firstname, middlename, lastname, username, password, contactNumber, address, sex, age, userType)
        VALUES ('$firstName', '$middleName', '$lastName', '$username', '$password', '$contactNumber', '$address', '$sex', '$age', 'user') ";

    

    if (mysqli_query($data, $sql)) {
        $message[] = 'Successfully registered!';
        header('location:login.php');
    } else {
        $message[] = 'Failed registration, please try again';
    }
}

?>