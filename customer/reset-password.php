<?php
session_start();
include_once "../access-db.php";
if (count($_POST) > 0) {
    $client_id = $_SESSION['user_id'];
    $password = $_POST['password'];

    mysqli_query($conn, "UPDATE farm_client SET client_password='" . $password . "' WHERE user_id='" . $client_id . "'");
    header('Location: customer-logged-in.php?');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
    <title>UB Tutoring</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap" rel="stylesheet">
    <title>UB Tutoring Service</title>
</head>

<body>

    <div class="header">

        <div class="menu_welcomePage">
            <ul>

                <!-- the line of code commented below is important when we upload the work on a server. for now, i'm using an alternative below -->
                <!-- <li><a href="javascript:loadPage('./login.php')">login</a> </li> -->
                <li>
                    <a class="navlink" href="../index.html">home</a> </li>

            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.html">UBtutoring</a> </h2>
        </div>

    </div>
    <hr class="hr-navbar">
    <br>
    <br>
    <br>
    <br>
    <div class="modal">

    <h1 class="welcome-page-title modal-title">Forgot Password</h1>
    <br>
    <br>
    <br>
    <br>
    <div id="tutor_signup_div">
        <form method="post" action="">
        <div class="message">

        <?php if ($message != "") {
    echo $message;

}?>
        </div>
        <div class="modal-input">
            <input class= "log_in_input" type="text" id="email" name="password" placeholder="Enter new password">

            <input type="submit" id="log_in_button" name="submit" type="submit" value="Submit">


        </form>
        <br><br>
        </div>

    </div>
    </div>
    <script src="../index.js"></script>
</body>
</html>