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
        $query = "SELECT * FROM farm_admin WHERE admin_email='$email'";
        $result = mysqli_query($conn, $query);

        if($row=mysqli_fetch_assoc($result)){
            $db_password = $row['admin_password'];
            
            if($paswd == $db_password){
                $idnum=$row['admin_id'];
                $_SESSION["user_id"] = $idnum;
                header("location:admin.php?user_id=" .$idnum);
            }
            else {
                echo 'incorrect password';
                header("location:admin-login.php");
            }
        }
        else {
            echo 'the user does not exist';
            header("location:admin-login.php");
        }
    }
}

?>