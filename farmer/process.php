<?php
include_once "access-db.php";

if(isset($_POST['btn-login'])){

    $email = $_POST['email'];
    $paswd = $_POST['paswd'];

    if(empty($email) || empty($paswd)){

        echo 'fill in the blanks';
    }
    else {
        $query = "SELECT * from farmproduce WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if($row=mysqli_fetch_assoc($result)){
            $db_password = $row['paswd'];

            if(md5($paswd) == $db_password){
                header("location:farmer.php");
            }
            else {
                echo 'incorrect password';
            }
        }
        else {
            echo 'please check your query';
        }
    }
}

?>