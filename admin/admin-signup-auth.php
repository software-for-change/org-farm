<?php
$message = "";

include_once "../access-db.php";

if (count($_POST) > 0) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['paswd'];
    $phone = $_POST['phone'];

    $result = mysqli_query($conn, "SELECT * FROM farm_admin WHERE admin_email='" . $_POST["email"] . "'");
    $count = mysqli_num_rows($result);

    if (empty($fname) || empty($lname)) {
        $message = "Please enter a first and last name.";
    } else if ((strpos($email, '@.') === false)) {
        $message = "Please enter a valid email address.";
    } else if ($count > 0) {
        $message = "Email address is already in use.";
    } else if (!preg_match('(^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$)', $pass)) {
        $message = "Please enter a valid password.";
    } else if (strlen($phone) != 10) {
        $message = "Please input a 10 digit phone number.";
    } else {

        if (mysqli_query($conn, "INSERT INTO farm_admin (first_name, last_name, phone, admin_email, admin_password) VALUES ('$fname', '$lname', '$phone', '$email', '$pass')")) {
            $message = "you have successfully created an account as the admin. You can now use your credentials to login";

        } else {
            $message = 'sorry your account has not been created';
        }
    }
}
