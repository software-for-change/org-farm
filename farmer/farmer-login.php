<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap" rel="stylesheet">
    <title>Simply Organic </title>
</head>

<body>

    <br>
    <br>
    <br>
    <div class="modal">
        <h1 class="">Farmer Log In</h1>
        <br><br>

        <div id="frm">
            <form method='POST' action="farmer-login-auth.php">


                <label for="email">User Email</label>
                <input type="text" id="email" name="email" placeholder="email" autofocus>

                <label for="password">Password</label>
                <input type="text" id="paswd" name="paswd" placeholder="password">

                <input id="btn" type="submit" value="Login" name="btn-login">
                <br>
                <br>
                <br>
                <a href="user-forgot.php" id="forgot_link_id"> forgot password? </a>
                <br>
                <br>

            </form>
        </div>
    </div>

    <br><br>
    <script src="../index.js"></script>

</body>

</html>