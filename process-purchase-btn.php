<?php
session_start();
include_once "access-db.php";

if(!isset($_SESSION["user_id"])){ //if login in session is not set
    $_SESSION['message'] = 'please log in before purchasing an item';
    header("location:customer/customer-login.php");
}
else {
    // submit the form and update the db table with the new purchase item
    if(count($_POST > 0)) {

        $pack_id = $_POST['package_id'];
        $client_id = $_SESSION['user_id'];
        $_SESSION['package_id'] = $pack_id;

        if (mysqli_query($conn, "INSERT INTO farm_purchase_items (package_id, client_id) VALUES ('$pack_id', '$client_id')")) {
            $_SESSION['message'] = "you have successfully created an account as the client. You can now use your credentials to login";
            header("location:customer/customer-loggedin.php?");

        } else {
            $_SESSION['message'] = 'sorry your item has not been added to the cart due to system failure';
            header("location:../index.php?");
        }

    } else {

        echo "soory could not update te item";

    }//
}



?>