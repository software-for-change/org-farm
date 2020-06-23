<?php
session_start();
include_once "../access-db.php";

if (!isset($_SESSION["user_id"])) { //if login in session is not set
    header("location:customer-login.php");
}

$user = $_SESSION['user_id'];

$sql = "SELECT * FROM farm_purchase_items WHERE user_id='$user'";
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
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>Customer</title>
</head>

<body>

<?php include '../header.php';?>
    <div class="banner">
        <h1 class="pageTitle">Simply Organic</h1>
    </div>

    <h1>shopping cart</h1>

    <div class="page-content">
        <div id="content">
            <div id="left">
                <div class="slogan">

                    <?php

                        if ($result->num_rows > 0) {

                            echo "<div class='thegrid'";
                            echo "<table class='prodcue-table'>";

                            // output data of each row
                            while ($row = mysqli_fetch_array($result)) {

                                $package = $row['package_id'];

                                $query = "SELECT food_name, price, food_image FROM farm_food WHERE food_id='$package'";
                                $newresult = $conn->query($query);

                                while ($newrow = mysqli_fetch_array($newresult)) {
                                    $food_name = $newrow["food_name"];
                                    $food_image = $newrow["food_image"];
                                    $price = $newrow["price"];
                                    $sum += $price;

                                    echo "<div class='food-item'";

                                    echo "<tr>
                                                                                    <td>";
                                    echo '<img height="200" width="200" src="data:image/jpg;base64,' . base64_encode($row['food_image']) . '" />';
                                    echo "
                                                                                        <div class='food-post'>
                                                                                        <p> " . $food_name . " </p>
                                                                                        <p> $" . $price . " </p>";

                                    echo "<br>";
                                    echo "<button id='minus'>−</button>
                                                                        <input type='number' value='0' id='input' />
                                                                        <button id='plus'>+</button>";

                                    echo " </div>";

                                    echo "</td>";
                                    echo "</tr>";
                                    echo "</div>";

                                }
                                echo "<p> The total price for your items ".$sum."</p>";
                                echo "</table>";
                                echo "</div>";

                            }
                        } else {
                            echo "Sorry, you did not select any item to be added to the cart";

                        }
                        ?>

                </div>

            </div>

            <div id="right">
                <div class="welcomepage-card shopping-message">
                    <img class="rain-img" src="rain-128.png" width="40" height="40" alt="">
                    <br>
                    <div class="veges-rain">
                        <img src="../images/sweet-pepper-24.png" alt="">
                        <img src="../images/carrot-24.png" alt="">
                        <img src="../images/chili-pepper-29-24.png" alt="">
                    </div>
                    <br>
                    <h1>Raining Vegetables</h1>
                    <br>
                    <p>First things first, yes, it's true I want your money.
                        But I want to give you great food in return Shop with me so I can meet your
                        food demands and you meet my money demands. Buy today!



                        <!-- have a form to submit this info -->

                        <p>Choose your delivery frequency</p>
                        <!-- options are: once, weekly, bi-weekly -->

                        <!-- have a complete purchase button -->

                        <!-- that button routes you to the checkout shopping cart page -->

                        <!-- check out has a continue shoppint button and a complete order button -->

                        <!-- include a shopping cart table that displays all the items in the cart table -->

                        <!-- one takes you to the index page and the other takes you to complete order -->

                        <!-- have a form to submit this info -->

                        <p>Choose your delivery frequency</p>

                    </p>
                    <br>
                    <button onclick="window.location.href='#our-packages'">Order With Us</button>
                    <br> <br>
                    <div class="group-buttons">
                        <a class="w3-btn w3-black card-button" href="#how-it-works">How it works</a>
                        <a class="w3-btn w3-black card-button" href="#where-we-deliver">Delivery</a>
                        <a class="w3-btn w3-black card-button" href="subscribe.php">Subscribe</a>

                    </div>

                </div>

            </div>
        </div>

        <p>your past orders</p>

    </div>

    <?php include '../footer.php';?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>