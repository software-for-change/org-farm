<?php
session_start();
include_once "../access-db.php";

echo "the user id", $_SESSION['user_id'];

if (count($_POST) > 0) {
    //get the confirmation id
    $confirm_id = $_GET['confirm_id'];

    echo "the confrimation id ", $confirm_id; 

    //use the confirm id to get the items with that id in the stock table
    $query = "SELECT * FROM farm_user_stock WHERE confirmation_id='$confirm_id'";
    $items = mysqli_query($conn, $query);

    //use the food id from items to get the food item details in stock.
    if ($row = mysqli_fetch_assoc($items)) {
        $food_id = $row['food_id'];
        echo "the food id ", $food_id;
        $quantity = $row['stock_quantity'];
        echo "the quantity ", $quantity;

        //use the food id to get the name and shelf life
        $query = "SELECT food_name, food_shelfLife FROM farm_food WHERE food_id='$food_id'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {

            $food_name = $row['food_name'];
            $shelfLife = $row['food_shelfLife'];


            //create a page that handles the process for this form
            //when the user has the item approved, add a col to the table for approve and reject --the user stock table
            //if approve, mark the field for approved as 1 if rejected, mark the field as 0
            echo "<form method='post' action=''>";
            echo "<table class='prodcue-table'><br><br>";
    
            echo "<tr style='height: 40px'>
                            <td>" . $food_name . "</td>
                            <td> ". $shelfLife."</td>
                            <td> ". $quantity."</td>
                            <td> <input type='submit' value='approve'><input type='submit' value='reject'></td>
                        </tr>";
    
            echo "</table>";
    
            echo "</form>";

        }

    }

    
}
else {
    echo "Sorry, the form is not submitted due to system failure";
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
    <title>Farmer Inventory</title>
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

    <br>
    <br>
    <br>

    <div class="page-content">

    <h1> Inventory items </h1>

    <form method="post" action="">
        <label for="confirm_id">Enter your confirmation ID</label>
        <input type="text" id="confirm_id" name="confirm_id" placeholder="confirmation ID">
        <input id="btn" type="submit" value="submit" name="submit">
    </form>

    <br><br>
    <form action="">
        <label for="img">Upload your image</label>
        <input type="file" id="img" name="food_image" accept="image/*">
        <input type='submit' value='submit'>
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

<!-- prompt the user to enter their confirmation id

return all the items based on the confirmation id

use the food id from the conf id to get the data of the item for the food table

show the name of the items

show the shelf life of the item.

show the stock quantity of the items from the confirm id data

upload the image of the item

confirm or approve of the item  -->

