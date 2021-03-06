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

<body class="access_page">

    <div class="header">
        <div class="menu_navbar">
            <ul>
                
                <li><a class="navlink" href="../admin/admin-login.php">admin login</a> </li>
                <!-- <li><a class="navlink" href="../farmer/farmer-login.php">farmer login</a> </li> -->
                <li><a class="navlink" href="../customer/customer-login.php">customer login </a> </li>
                
            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.php">Farm Organic</a> </h2>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="page-content"> 
        <div class="modal">
            <h1 class="">Farmer Log In</h1>
            <br><br>

            <div id="frm">
                <form method='POST' action="farmer-login-auth.php">

                    <input type="text" class="login_input" id="email" name="email" placeholder="Enter Email" autofocus>
                    <br><br>
                    <input type="text" class="login_input" id="paswd" name="paswd" placeholder="Enter Password">
                    <br><br>
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


    </div>
    <br><br>
    <script src="../index.js"></script>

</body>

</html>