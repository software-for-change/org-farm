<?php
include_once "../access-db.php";
if(count($_POST)>0) {
    $result = mysqli_query($conn,"SELECT * FROM farm_clients WHERE email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$_SESSION['message'] = "This email is not recognized in our system. Please try again.";
	} else {
        $row=mysqli_fetch_array($result);
        $to=$_POST["email"];
        $code= strval(mt_rand(100000, 999999));
        $message="Your verification code is ";
        $message.=$code;
        $from="no-reply@buffalo.com";
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1" . "\r\n";
        $headers .= "From: ". $from. "\r\n";
        $headers .= "Reply-To: ". $from. "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "X-Priority: 1" . "\r\n";
        mail($to, $subject, $message, $headers);
        mysqli_query($conn,"UPDATE farm_clients SET vcode='" . $code  . "' WHERE customer_id='" . $row['customer_id'] . "'"); 
        header('Location: verify-email-customer.php?user_id=' . $row['customer_id']);

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

    <h1 class="welcome-page-title modal-title">Forgot Password</h1>
    <br>
    <br>
    <br>
    <br>
    <div class="page-content">
        <form method="post" action="">

            <input class= "sign_up_input" type="text" id="email" name="email" placeholder="Enter email">

            <input class="submit-button" type="submit" value="Submit">


        </form>
        <br><br>
    </div>

    </div>
    </div>
    <script src="../index.js"></script>
</body>
</html>