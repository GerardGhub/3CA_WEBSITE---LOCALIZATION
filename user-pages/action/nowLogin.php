<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "user_db";

$data = mysqli_connect($host, $user, $password, $db);

// Verify reCAPTCHA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['g-recaptcha-response'])) {

    $recaptcha_secret_key = '6LcvfKkpAAAAAIEM_wmkOsVtGnrLdiq571lK5Ova'; // Replace with your reCAPTCHA secret key
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => $recaptcha_secret_key,
        'response' => $recaptcha_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $recaptcha_options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data)
        ]
    ];

    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    $recaptcha_data = json_decode($recaptcha_result, true);

    if ($recaptcha_data['success']) {

        // Proceed with login verification
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM form_db WHERE username = '".$email."' AND password = '".$pass."' AND IsActive=1";

        $result = mysqli_query($data, $sql);

        $row = mysqli_fetch_array($result);



        if ($row["userType"] == "admin") {

            $_SESSION["id"] = $row["id"];
            $_SESSION["firstname"] = $row["firstname"];
            $_SESSION["lastname"] = $row["lastname"];
            $_SESSION["middlename"] = $row["middlename"];
            $_SESSION["sex"] = $row["sex"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["contactNumber"] = $row["contactNumber"];
            $_SESSION["username"] = $row["username"];
            header("location:../../admin-pages/admin.php");
        } else if ($row["userType"] == "user") {
            $_SESSION["userEmpID"] = $row["id"];

  // Cart Header
            $sqlShoppingCart = "SELECT * FROM tocart_db WHERE  userid='{$_SESSION["userEmpID"]}' AND reference='' AND is_active = 1";
            $queryCart = mysqli_query($data, $sqlShoppingCart);
            $rowCountCart = mysqli_num_rows($queryCart);

            $_SESSION["current_cart_count"] =  $rowCountCart;


            //Message
            $sqlShoppingCart = "SELECT * FROM tocart_db WHERE  userid='{$_SESSION["userEmpID"]}' AND NOT reference='' AND is_active = 1 AND NOT message=''";
            $queryCartMessage = mysqli_query($data, $sqlShoppingCart);
            $rowCountCartMessage = mysqli_num_rows($queryCartMessage);

            $_SESSION["message_count"] =  $rowCountCartMessage;


            $_SESSION["id"] = $row["id"];
            $_SESSION["firstname"] = $row["firstname"];
            $_SESSION["lastname"] = $row["lastname"];
            $_SESSION["middlename"] = $row["middlename"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["contactNumber"] = $row["contactNumber"];
            $_SESSION["sex"] = $row["sex"];
            $_SESSION["address"] = $row["address"];



            header("location: ../../index.php");
        } else {
            // Display login error message within the existing HTML structure
            echo "<script>document.getElementById('loginError').style.display = 'block';</script>";
            header('location: login.php');
        }

    } else {
        // Display reCAPTCHA verification error message within the existing HTML structure
        echo "<script>alert('Please verify reCAPTCHA')</script>";
       
        
    }


} else {
    // Display reCAPTCHA response not set error message within the existing HTML structure
    echo "<script>alert('reCAPTCHA Verification Error')</script>";

    
}

?>

<!-- nowLogin.php -->