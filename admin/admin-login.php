<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap"
        rel="stylesheet">
    <title>Simply Organic </title>
</head>

<body class="access_page">

    <div class="header">
        <div class="menu_navbar">
            <ul>

                <li><a class="navlink" href="../admin/admin-login.php">admin login</a> </li>
                <li><a class="navlink" href="../farmer/farmer-login.php">farmer login</a> </li>
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


    <div id="content">
        <div id="left">
            <div id="object1">
                
                <div class="page-content">
                    
                    <div class="modal">
                        <h1 class="">Admin Log In</h1>
                        <br><br>

                        <div id="frm">
                            <form method='POST' action="admin-login-auth.php">

                                <input type="text" class="login_input" id="email" name="email" placeholder="Enter Email"
                                    autofocus>
                                <br><br>

                                <input type="text" class="login_input" id="paswd" name="paswd"
                                    placeholder="Enter Password">

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
            </div>
            
        </div>

        <div id="right">
            <div id="object3">

                
                <div class="page-content">
                <h1>Sign Up</h1>

                <form method="post" action="admin-signup-auth.php">
                    <label>Fields marked * must be filled in order to create an account.</label>
                    <br>
                    <br>
                    <div class="message">

                        <?php
                            if ($message != "") {
                                echo $message;

                        }?>
                    </div>
                   
                    <br>
                    <input class="sign_up_input" type="text" id="fname" name="fname" placeholder="Enter First name" required>
                    <br>
                    <br>
                    <input class="sign_up_input" type="text" id="lname" name="lname" placeholder="Enter Last name" required>
                    <br>
                    <br>
                    <input class="sign_up_input" type="text" id="email" size="30" name="email" placeholder="Enter Email" required>
                    <br>
                    <br>
                    <input class="sign_up_input" type="password" minlength="8" id="paswd" name="paswd" placeholder="Enter Password. 1 uppercase, lowercase, special character & number" required>
                    <br>
                    <br>
                    
                    <input class="sign_up_input" minlength="8" type="password" id="paswd2" name="paswd2"
                        placeholder="Confirm password" required>
                    <br>
                    <br>
                    <input class="sign_up_input" type="text" id="phone" name="phone" placeholder="Enter 10 digit phone number" required>
                    <br>
                    <br>
                    <input type="submit" id="tutor_signup_submit" value="Sign Up">
                    <br><br><br>
                </form>

                </div>

            </div>
            
        </div>
    </div>


    <br><br>
    <script src="../index.js"></script>

</body>

</html>