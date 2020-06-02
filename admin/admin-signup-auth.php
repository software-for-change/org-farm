<?php
session_start();
include_once "../access-db.php";
$message = "";

if (count($_POST) > 0) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['paswd'];
    $phone = $_POST['phone'];

    $result = mysqli_query($conn, "SELECT * FROM farm_admin WHERE admin_email='" . $_POST["email"] . "'");
    $count = mysqli_num_rows($result);

    if (empty($fname) || empty($lname)) {
        echo "Please enter a first and last name.";
    } else if ($count > 0) {
        $_SESSION['error'] = "Email address is already in use.";
        header("Location:admin-login.php?");
    } else if (!preg_match('(^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$)', $pass)) {
        echo "Please enter a valid password.";
    } else if (strlen($phone) != 10) {
        echo "Please input a 10 digit phone number.";
    } else {

        if (mysqli_query($conn, "INSERT INTO farm_admin (first_name, last_name, phone, admin_email, admin_password) VALUES ('$fname', '$lname', '$phone', '$email', '$pass')")) {
            echo "you have successfully created an account as the admin. You can now use your credentials to login";
            header("location:admin-login.php?");
        } else {
            echo 'sorry your account has not been created';
            header("location:admin-login.php?");
        }
    }
}
