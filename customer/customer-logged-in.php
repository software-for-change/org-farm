<?php
    session_start();
    include_once "../access-db.php";

    if(!isset($_SESSION["user_id"])){ //if login in session is not set
        header("location:customer-login.php");
    }
    $package = $_SESSION['package_id'];

    $sql = "SELECT food_name, price, food_image FROM farm_food WHERE food_id='$package'";
    $result = $conn->query($sql);

    if (count($_POST) > 0) {

        //route to the shopping cart after update
        header("location:shopping-cart.php");

    }

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Customer</title>
</head>

<body class="banner customer-loggedin">

    <?php include '../header.php';?>


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

                                $food_name = $row["food_name"];
                                $food_image = $row["food_image"];
                                $price = $row["price"];

                                echo "<div class='food-item'";

                                echo "<tr>
                                                        <td>";
                                echo '<img height="400" width="400" src="data:image/jpg;base64,' . base64_encode($row['food_image']) . '" />';
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
                            echo "</table>";
                            echo "</div>";

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
                    <h1>PURCHASE ITEM</h1>
                    <br>
                    <p> Our packages have fresh produce from our farms specially picked and packaged
                        to mee your nuitrition needs. We pride ourselves in producing strictly organic
                        farming produce.

                        <!-- have a form to submit this info -->

                        <p>Choose your delivery frequency</p>

                        <form method="POST" action="">
                            <input type="checkbox"  name="once" checked>
                            <label for="once">Just Once</label>
                            <input type="checkbox" name="weekly" >
                            <label for="weekly">Weekly</label>
                            <input type="checkbox" name="bi-weekly" >
                            <label for="bi-week">Bi-Weekly</label>
                            <input type="submit" class="submit-button" name="delivery" value="Purchase" >
                        </form>

                       
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