<?php
session_start();
include_once "../access-db.php";

if(isset($_POST['btn-login'])){

    $email = $_POST["email"];
    $paswd = $_POST["paswd"];

    if(empty($email) || empty($paswd)){

        echo 'fill in the blanks';
    }
    else {
        $query = "SELECT * FROM farm_clients WHERE customer_email='$email'";
        $result = mysqli_query($conn, $query);

        if($row=mysqli_fetch_assoc($result)){
            $db_password = $row['customer_password'];

            if($paswd == $db_password){
                $idnum=$row['customer_id'];
                $_SESSION["user_id"] = $idnum;
                
                header("location:../index.php?user_id=" .$idnum);
                echo '<body style="background-color:white">';
            }
            else {
                echo 'incorrect password';
               // header("location:customer-login.php");
            }
        }
        else {
            echo '<p>the user does not exist</p>';
           // header("location:customer-login.php");
        }
    }
}

?>