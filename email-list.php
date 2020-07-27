<?php
session_start();
include_once "access-db.php";

if (count($_POST) > 0) {
    $email = $_POST['email'];
    $names = $_POST['names'];
    $phone = $_POST['phone'];

    $result = mysqli_query($conn, "SELECT * FROM farm_emailList WHERE email='" . $_POST["email"] . "'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        header("Location:index.php?");
        $_SESSION['message'] = "No worries, we already added you to the list";
    } else if (strlen($phone) != 10) {
        $_SESSION['message'] = "Please input a 10 digit phone number.";
        header("Location:index.php?");
    } else {
        if (mysqli_query($conn, "INSERT INTO farm_emailList (names, email, phone) VALUES ('$email', '$names', '$phone')")) {
            $_SESSION['message'] = "Thank you for signing up. We will keep you notified when we open for business.";
            header("location:index.php?");
            echo "<body onload='off()'>";
        } else {
            $_SESSION['message'] = 'Sorry we were not able to add your name to the email list. Please try again';
            header("location:index.php?");
            
        }
    }
}
