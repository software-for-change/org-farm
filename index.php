<?php
include_once "access-db.php";

$sql = "SELECT food_name, price, food_image FROM farm_food";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simply Organic</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
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

<body class="banner">

    <div class="header">
        <div class="menu_navbar">
            <ul>
                <li><a class="navlink" href="customer/customer-login.php">Login </a> </li>
                <li><a class="navlink" href="admin/admin-login.php">Contact Us</a> </li>
                <li><a class="navlink" href="admin/admin-login.php">Delivery</a> </li>
                <li><a class="navlink" href="farmer/farmer-login.php">About us</a> </li>
                <li><a class="navlink" href="farmer/farmer-login.php">Why Subscribe?</a> </li>
            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="index.php">Farm Organic</a> </h2>
        </div>
    </div>

    <div id="content">
        <div id="left">
            <div class="slogan">

                <div class="banner-title before-login">
                    <h3>We Deliver Fresh, Natural and Organic Produce to your door!</h3>
                </div>


            </div>

        </div>

        <div id="right">
            <div class="loggedin-image">
                <button>Order With Us</button>
                <a href="#how-it-works">How it works?</a>
                <a href="#where-we-deliver">Where we deliver</a>
                <a href="subscribe.php">Subscribe NOW!</a>
            </div>

        </div>
    </div>

    <br><br><br><br><br><br>

    <div class="display-items before-login-bkgd">

        <h1>Our Packages</h1>
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

    <div class="banner-how-it-works" id="how-it-works">

        <div id="content">
            <div id="left">
                <div class="content-how-it-works">

                    <h2>How it works</h2>

                    <p>At the beginning of each week we send out an email letting you know what is being harvested by
                        our farmers for the current week’s Farmbox. You then can go into your account and customize your
                        Farmbox with up to 5 substitutions, per Farmbox. You then can add Artisanal items, and other
                        grocery items we offer to come with your Farmbox delivery. The cut off is Wednesday at 12PM EST
                        to skip or cancel an order for the next week. The cut off Ito make subs is Friday at 10am EST.
                        We then deliver your Farmbox to your door in a box that is Eco friendly! Please be sure to
                        recycle your boxes and packing material.</p>



                    <p>
                        We do not charge a fee for registration or membership! </p>

                    <p>

                        Minimum order is $38.95 and we have a $5.98 handling and packing fee. All of our boxes and
                        packing material are biodegradable / recyclable.

                        How It Works:

                        We use UPS for our delivery needs and provide all customers with tracking information.
                        Unfortunatley we are unable to deliver to PO Boxes. We use insulation that is biodegradable and
                        ice packs to keep your box at the perfect temperature and insure safe delivery.

                        Delivery Schedule

                        We deliver on different days to different zip codes. Please input your zip code to find out your
                        delivery day. Once the box leaves us it is in the hands of UPS. Your credit card will be charged
                        on Friday at 10am EST. We have a cut off because we must tell our Farmers and Artisans what we
                        need for each delivery. Don’t worry, if you miss this week’s cut off, be sure to still create an
                        account so you are on our email list for the following week's harvest!

                        *Please note: Delivery delay can be at the hands of Mother Nature due to weather, or traffic
                        delays, once the order leaves us it is in the hands of UPS. All damage reports must be made to
                        hello@farmboxdirect.com within 24 hours of receiving your order and pictures may be requested*
                    </p>


                </div>

            </div>

            <div id="right">
                <div class="steps-how-it-works">
                    <h1>Step By Step</h1>
                    <hr class="bar first-bar">
                    <hr class="bar second-bar">

                    <ul>
                    <img src="https://img.icons8.com/color/48/000000/beet.png"/>
                        <li>we get our fresh produce from our organic farms</li>
                        <img src="https://img.icons8.com/color/48/000000/beet.png"/>
                        <li>You create an account and choose your delivery frequency</li>
                        <img src="https://img.icons8.com/color/48/000000/beet.png"/>
                        <li>select your box size</li>
                        <li>We then deliver our simpliy organic products to your door step </li>
                    </ul>
                    <button>icon / image</button>
                </div>

            </div>
        </div>



    </div>

    <div class="banner-delivery" id="where-we-deliver">

        <div id="content">
            <div id="left">
                <div class="content-delivery">

                    <h2>Where we deliver</h2>

                    <p>residential areas and offices around kampala and Mbale</p>


                </div>

            </div>

            <div id="right">
                <div class="icon-delivery">
                    <button>Delivery image</button>
                </div>

            </div>
        </div>



    </div>

    <div class="footer">
        <a href="contact.php">Need help?</a>
        <a href="subscribe.php">subscribe</a>
        <a href="about.php">About us</a>

        <a href="http://www.onlinewebfonts.com">oNline Web Fonts</a>
        <a href="https://icons8.com/icon/13299/beet">Beet icon by Icons8</a>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>