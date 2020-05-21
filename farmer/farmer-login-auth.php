<?php
include_once "../access-db.php";

if(isset($_POST['btn-login'])){

    $email = $_POST["email"];
    $paswd = $_POST["paswd"];

    if(empty($email) || empty($paswd)){

        echo 'fill in the blanks';
    }
    else {
        $query = "SELECT * FROM farm_farmers WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if($row=mysqli_fetch_assoc($result)){
            $db_password = $row['paswd'];

            if($paswd == $db_password){
                $idnum=$row['user_id'];
                header("location:farmer.php?user_id=" .$idnum);
            }
            else {
                echo 'incorrect password';
            }
        }
        else {
            echo 'the user does not exist';
        }
    }
}

?>