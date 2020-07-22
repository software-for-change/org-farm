<?php
session_start();
include_once "../access-db.php";

if (!isset($_SESSION["user_id"])) { //if login in session is not set
    header("location:customer-login.php");
}

$user = $_SESSION['user_id'];
$sum = 0;

$sql = "SELECT * FROM farm_purchase_items WHERE client_id='$user'";
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
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
</head>

<body class="shopping-cart-pg">

    <?php include '../header.php';?>


    <div class="content">
        <div class="w3-row">

            <div class="w3-half">

            </div>
            <div class="w3-half">

            </div>
        </div>

    </div>
    <h1>shopping cart</h1>

    <div class="page-content">
        <div id="content">
            <div id="left">
                <div class="slogan">

                    <?php

                        if ($result->num_rows > 0) {
                            
                            echo "<div class='w3-row w3-padding-64'>";

                            // output data of each row
                            while ($row = mysqli_fetch_array($result)) {

                                $package = $row['package_id'];

                                $query = "SELECT food_name, price, food_image FROM farm_food WHERE food_id='$package'";
                                $newresult = $conn->query($query);

                                

                                while ($newrow = mysqli_fetch_array($newresult)) {
                                    echo "<div class='w3-third'>";
                                    $food_name = $newrow["food_name"];
                                    
                                    $price = $newrow["price"];
                                    $sum += $price;

                                   

                                    echo "<div class='food-item'";

                                    echo "<tr>
                                                                                    <td>";
                                    echo '<img height="200" width="200" src="data:image/jpg;base64,' . base64_encode($newrow['food_image']) . '" />';
                                    echo "
                                                                                        <div class='food-post'>
                                                                                        <p> " . $food_name . " </p>
                                                                                        <p> $" . $price . " </p>";

                                    echo "<br>";
                                    echo "<button class='w3-btn w3-amber'>delete</button>";
                                    echo " </div>";

                                    
                                    echo "</div>";
                                    echo "</div>";

                                }

                                
                                
                            }

                           
                            echo "</div>";

                        } else {
                            echo "Sorry, you did not select any item to be added to the cart";

                        }
                        ?>

                </div>

            </div>

            <div id="right">
                <div class="welcomepage-card shopping-message">
                    <img class="rain-img" src="../images/rain-128.png" width="40" height="40" alt="">
                    <br>
                    <div class="veges-rain">
                        <img src="../images/sweet-pepper-24.png" alt="">
                        <img src="../images/carrot-24.png" alt="">
                        <img src="../images/chili-pepper-29-24.png" alt="">
                    </div>
                    <br>
                    <h1>Raining Vegetables</h1>
                    <br>
                    <p>

                        <?php
                            echo "<h1>TOTAL  : ".$sum. " </h1> ";
                            
                        ?>
                        <br><br>
                        <button>Continue shopping</button>
                        <br><br>
                        <button>Pay for Order</button>

                    </p>
                    <br>


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