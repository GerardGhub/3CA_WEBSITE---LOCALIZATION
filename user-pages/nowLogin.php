<?php 



$host = "localhost";
$user = "root";
$password = "";
$db = "user_db";

$data = mysqli_connect($host, $user, $password, $db);


// Verify reCAPTCHA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['g-recaptcha-response'])) {

    $recaptcha_secret_key = '6LcsHSUpAAAAAF5WcVOulUEWDU4yIqPw20OhIJ3f'; // Replace with your reCAPTCHA secret key
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

        $sql = "SELECT * FROM form_db WHERE username = '".$email."' AND password = '".$pass."' ";

        $result = mysqli_query($data, $sql);

        $row = mysqli_fetch_array($result);

        if ($row["userType"] == "admin") {
            header("location:/admin-pages/admin.php");
        } else if ($row["userType"] == "user") {
            header("location:/user-pages/index.php");
        } else {
            // Display login error message within the existing HTML structure
            echo "<script>alert('Incorrect username or password. Please register.')</script>";
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


