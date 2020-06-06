<?php
session_start();
include_once "../access-db.php";

if (count($_POST) > 0) {
    $email = $_POST['email'];
    $pass = $_POST['paswd'];
    $phone = $_POST['phone'];

    $result = mysqli_query($conn, "SELECT * FROM farm_clients WHERE admin_email='" . $_POST["email"] . "'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $_SESSION['message'] = "Email address is already in use.";
        header("Location:admin-login.php?");
    } else if (!preg_match('(^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$)', $pass)) {
        $_SESSION['message'] = "Please enter a valid password.";
        header("Location:customer-login.php?");
    } else if (strlen($phone) != 10) {
        $_SESSION['message'] = "Please input a 10 digit phone number.";
        header("Location:customer-login.php?");
    } else {

        if (mysqli_query($conn, "INSERT INTO farm_clients (customer_email, customer_password, phone) VALUES ('$email', '$pass', '$phone')")) {
            $_SESSION['message'] = "you have successfully created an account as the client. You can now use your credentials to login";
            header("location:customer-login.php?");
        } else {
            $_SESSION['message'] = 'sorry your account has not been created';
            header("location:customer-login.php?");
        }
    }
}
