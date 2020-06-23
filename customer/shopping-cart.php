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
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>Customer</title>
</head>

<body class="banner shopping-cart-pg">

<?php include '../header.php';?>
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
                                    echo "<button >delete</button>";
                                    echo " </div>";

                                    echo "</td>";
                                    echo "</tr>";
                                    echo "</div>";

                                }

                                
                                
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