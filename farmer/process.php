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

        echo 'this is the password entered', $paswd;
        $result = mysqli_query($conn, $query);

        if($row=mysqli_fetch_assoc($result)){
            $db_password = $row['paswd'];

            echo '';
            echo 'this is the pasword from the db ', $db_password;

            if($paswd == $db_password){
                header("location:farmer.php");
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