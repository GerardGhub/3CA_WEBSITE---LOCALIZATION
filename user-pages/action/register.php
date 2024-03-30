<?php

include("../../db/recon.php");

if (isset($_POST['signIn'])) {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];

    $sql = "INSERT INTO form_db (firstname, middlename, lastname, username, password, contactNumber, address, sex, age, userType,IsActive)
        VALUES ('$firstName', '$middleName', '$lastName', '$username', '$password', '$contactNumber', '$address', '$sex', '$age', 'user', 1) ";

    

    if (mysqli_query($conn, $sql)) {
        $message[] = 'Successfully registered!';
        header('location:login.php');
    } else {
        $message[] = 'Failed registration, please try again';
    }
}

?>