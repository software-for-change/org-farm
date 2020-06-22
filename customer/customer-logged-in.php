<?php
session_start();
include_once "../access-db.php";

if(!isset($_SESSION["user_id"])){ //if login in session is not set
    header("location:customer-login.php");
}

$sql = "SELECT food_name, price, food_image FROM farm_food";
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Customer</title>
</head>

<body class="customer-loggedin">

<?php include '../header.php';?>

    <div class="display-items">

        <p>Our prices: Nsaze ko nawe!</p>
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
                echo "</table>";
                echo "</div>";

            } else {
                echo "0 results";
            }
            ?>
    </div>

    <div class="shopping-message">

            <!-- have a form to submit this info -->

            <p>Choose your delivery frequency</p>
            <!-- options are: once, weekly, bi-weekly -->

            <!-- have a complete purchase button -->

            <!-- that button routes you to the checkout shopping cart page -->

            <!-- check out has a continue shoppint button and a complete order button -->

            <!-- include a shopping cart table that displays all the items in the cart table -->

            <!-- one takes you to the index page and the other takes you to complete order -->

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