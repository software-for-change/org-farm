<?php
include_once "../access-db.php";

$sql = "SELECT food_name FROM farm_food";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simply Organic</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap"
        rel="stylesheet">
    <title>Customer</title>
</head>

<body>

    <div class="header">
        <div class="menu_navbar">
            <ul>
                <li><a class="navlink" href="../about.html">about</a> </li>
                <li><a class="navlink" href="../admin/admin-login.php">admin login</a> </li>
                <li><a class="navlink" href="../farmer/farmer-login.php">farmer login</a> </li>
                <li><a class="navlink" href="../customer/customer-login.php">customer login </a> </li>
                <li><a class="navlink" href="../index.html">logout</a> </li>
                
            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.php">Farm Organic</a> </h2>
        </div>
    </div>

    <h1> Admin Page </h1>

    <h1>Welcome to the admin page</h1>
    





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>