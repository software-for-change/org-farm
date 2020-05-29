<?php
session_start();
include_once "../access-db.php";

echo "the user id", $_SESSION['user_id'];

if (count($_POST) > 0) {

    //get the food name
    $food = $_POST['food_name'];

    //get the shelf life
    $shelf_life = $_POST['shelf_life'];

    //get the food name
    $price = $_POST['food_price'];

    //get the food quantity
    $image = $_POST['food_image'];

    //store the user id in the userid col for the stock table
    if (mysqli_query($conn, "INSERT INTO farm_food (food_name, food_image, food_shelfLife, price) VALUES ('$food', '$image', '$shelf_life', '$price')")) {
        echo 'your stock has been added to the inventory';

    } else {
        echo 'there was an error, your stock has not been added';
    }
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
                <li><a class="navlink" href="../logout.php">logout</a> </li>

            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.php">Farm Organic</a> </h2>
        </div>
    </div>

    <h1> Admin Page </h1>

    <h1>Welcome to the admin page</h1>

    <a href="inventory-list.php">access the inventory list</a>

    <div id="frm">
        <form method='POST' action="">

            <label for="email">Food name</label>
            <input type="text" id="food_name" name="food_name" placeholder="Food name" autofocus>
            <br>
            <label for="password">Shelf life</label>
            <input type="number" id="shelf" name="shelf_life" min="2" max="100">
            <br>

            <label for="email">Price</label>
            <input type="number" id="price" name="food_price" placeholder="food price" autofocus>
            <br>
            <label for="img">Food image</label>
            <input type="file" id="img" name="food_image" accept="image/*">
            <br>

            <input id="btn" type="submit" value="submit" name="submit">
            <br>
            <br>

        </form>
    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>