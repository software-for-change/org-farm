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

<body class="customer-loggedin">

    <?php include '../header.php';?>

    <div class="content">
        <div class="purchase-container">


            <div class="w3-row">
                <div class="w3-half">
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
                <div class="w3-half">

                    <div class="shopping-message w3-center">

                        <h2 class="w3-padding-64">ITEM YOU SELECTED FOR PURCHASE</h2>

                        <p> You have can purchase this item once or start a weekly or bi-weekly delivery. If you choose
                            either weekly or bi-weekly, you will recieve a shipment of the item you selected at the
                            selcted frequency. Feel free to get in touch with us if you wish to cancel or pause the
                            delivery frequency. </p>

                        <!-- have a form to submit this info -->

                        <form  method="POST" class="w3-container w3-card-4" action="">
                            <h3>Choose your delivery frequency:</h3>
                            <p>
                                <input class="w3-check" type="checkbox" name="once" checked="checked">
                                <label>Just Once</label></p>
                            <p>
                                <input class="w3-check" type="checkbox" name="weekly">
                                <label> Weekly</label></p>
                            <p>
                                <input class="w3-check" type="checkbox" name="bi-weekly">
                                <label>Bi-Weekly</label></p>
                            <p>
                                <input type="submit" class="submit-button" name="delivery" value="Purchase">
                            </p>
                        </form>




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