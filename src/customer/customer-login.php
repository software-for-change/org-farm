<?php
session_start();

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

    <?php include '../header.php';?>

    <div class="display-message">
        <?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

    </div>

    <div class="content">
        <div class="w3-container w3-center access-container">


            <div class="w3-row access-row">
                <div class="w3-half">
                    <div class="w3-card-4 login-card">

                        <h2 class="w3-center">Customer Login</h2>

                        <form method='POST' class="w3-container" action="customer-login-auth.php">

                            <input id="email" name="email" class="w3-input w3-border" name="first" type="text"
                                placeholder="Enter email">
                            <br>

                            <input id="paswd" name="paswd" placeholder="Enter Password" class="w3-input w3-border"
                                name="last" type="text">

                            <br>
                            <input class="w3-btn w3-pink" id="btn" type="submit" value="Login" name="btn-login"></input>
                        </form>
                        <a href="user-forgot.php" id="forgot_link_id"> forgot password? </a>
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-card-4 signup-card">

                        <h2 class="w3-center">Customer Sign-up</h2>

                        <form method='POST' class="w3-container" action="customer-signup-auth.php">

                            <input class="w3-input w3-border" type="text" id="email" size="30" name="email"
                                placeholder="Enter Email" required>
                            <br>
                            <input class="w3-input w3-border" type="password" minlength="8" id="paswd" name="paswd"
                                placeholder="Enter Password. 1 uppercase, lowercase, special character & number"
                                required>
                            <br>
                            <input class="w3-input w3-border" minlength="8" type="password" id="paswd2" name="paswd2"
                                placeholder="Confirm password" required>
                            <br>
                            <input class="w3-input w3-border" type="number" id="phone" name="phone"
                                placeholder="Enter mobile money number" required>
                            <br>
                            <input class="w3-btn w3-green" type="submit" value="Sign Up">
                        </form>


                    </div>

                </div>

            </div>


        </div>
    </div>


    <?php include '../footer.php';?>


    <script src="../index.js">

    </script>

</body>



</html>