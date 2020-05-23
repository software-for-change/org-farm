<?php
include_once "../access-db.php";

$sql = "SELECT food_name FROM farm_food";
$result = $conn->query($sql);

if (count($_POST) > 0) {
    //get the user id
    $user_id = $_GET['user_id'];

    //get the food name
    $food = $_POST['food_name'];

    //get the food quantity
    $quantity = $_POST['quantity'];
    echo 'this is the food quantity ', $quantity;

    //use the food name to get the food id from the food table
    $query = "SELECT food_id FROM farm_food WHERE food_name='$food'";
    $id_result = mysqli_query($conn, $query);

    //update the stock table with the values of the food id, the stock qnautity and the userid of the farmer
    if ($row = mysqli_fetch_assoc($id_result)) {
        $food_id = $row['food_id'];

        //store the user id in the userid col for the stock table
        if (mysqli_query($conn, "INSERT INTO farm_user_stock (user_id, food_id, stock_quantity) VALUES ('$user_id', '$food_id', '$quantity')")) {
            echo 'your stock has been added to the inventory';

        } else {
            echo 'there was an error, your stock has not been added';
        }

    }

    //note: you don't need another id in the farmers table since you use the farmer_id to store the food in the stock table.
    //mysqli_query($conn, "UPDATE farm_farmers set quantity='" . $_POST['quantity'] . "' WHERE user_id=7");
    //$message = "Record Modified Successfully";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simply Organic</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap"
        rel="stylesheet">
    <title>Farmer Inventory</title>
</head>

<body>

    <div class="header">
        <div class="menu_navbar">
            <ul>
                <li><a class="navlink" href="about.html">about</a> </li>
                <li><a class="navlink" href="./admin/admin-login.php">admin login</a> </li>
                <li><a class="navlink" href="./farmer/farmer-login.php">farmer login</a> </li>
                <li><a class="navlink" href="./customer/customer-login.php">customer login </a> </li>
                <li><a class="navlink" href="index.html">logout</a> </li>
                
            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="index.html">Farm Organic</a> </h2>
        </div>
    </div>

    <h1> Farmer's Inventory </h1>

    <h1>enter the quantity for the foods you wish to add</h1>
    <?php

    if ($result->num_rows > 0) {
        echo "<form method='post' action=''>";
        echo "<table class='prodcue-table'><tr style='height: 80px'><th style='text-align:left'> Food Type </th><th style='text-align:left'> Quantity </th></tr><br><br>";

        // output data of each row
        while ($row = mysqli_fetch_array($result)) {

            $food_name = $row["food_name"];
            echo "<tr style='height: 40px'>
                        <td>" . $food_name . "</td>
                        <td> <input name='quantity' type='text'></td>
                        <input name='food_name'  type='hidden' value='$food_name' >
                        <td> <input type='submit' value='submit'></td>
                    </tr>";
        }
        echo "</table>";

        echo "</form>";

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