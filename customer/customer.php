<?php
include_once "access-db.php";

$sql = "SELECT food_name, price, food_image FROM farm_food";
$result = $conn->query($sql);

// if (count($_POST) > 0) {
   
// }

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
            <h2 class="logo"> <a href="../index.html">Farm Organic</a> </h2>
        </div>
    </div>

    <h1> Food for sale </h1>

    <?php

    if ($result->num_rows > 0) {
        
        echo "<table class='prodcue-table'><tr style='height: 80px'><th style='text-align:left'> Food Type </th><th style='text-align:left'> Quantity </th></tr><br><br>";

        // output data of each row
        while ($row = mysqli_fetch_array($result)) {

            $food_name = $row["food_name"];
            $food_image = $row["food_image"];
            $price = $row["price"];

            echo "<div class='col-md-4'";
            echo "<tr>
                        <td>
                            <div class='food-post'>
                            <p> " . $food_name . " </p>
                            <p> " . $price . " </p>
                            <img> " . $food_image . " </img>
                            <img src='data:image/jpg;base64,'. base64_encode($food_image).''/>
                            
                            </div>
                            
                        </td>
                    </tr>";
            echo "</div>";
        }
        echo "</table>";

    } else {
        echo "0 results";
    }
    ?>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>