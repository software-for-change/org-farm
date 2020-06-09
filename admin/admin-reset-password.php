<?php
session_start();
include_once "../access-db.php";
if (count($_POST) > 0) {
    $admin_id = $_SESSION['user_id'];
    $password = $_POST['password'];

    if (!preg_match('(^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$)', $password)) {
        $_SESSION['message'] = "Please enter a valid password.";
        header("Location:admin-reset-password.php?");
    } else {
        mysqli_query($conn, "UPDATE farm_admin SET admin_password='" . $password . "' WHERE admin_id='" . $admin_id . "'");
        header('Location: admin.php?');
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">

    <title>Simply Organic </title>
</head>

<body class="access_page">

    <div class="header">
        <div class="menu_navbar">
            <ul>

                <li><a class="navlink" href="admin-login.php">admin login</a> </li>
            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.php">Farm Organic</a> </h2>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="display-message">
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>

    </div>
    <div class="modal">

    <h1 class="page-sub-title">Reset Password</h1>
    <br>
    <br>
    <br>
    <br>
    <div id="tutor_signup_div">
        <form method="post" action="">
       
        <div class="modal-input">
            <input class= "log_in_input" type="text" id="email" name="password" placeholder="Enter Password. 1 uppercase, lowercase, special character & number">

            <input type="submit" id="log_in_button" name="submit" type="submit" value="Submit">


        </form>
        <br><br>
        </div>

    </div>
    </div>
    <script src="../index.js"></script>
</body>
</html>