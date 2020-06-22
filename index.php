<?php
include_once "access-db.php";
session_start();

$sql = "SELECT food_name, price, food_image FROM farm_food";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simply Organic</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Enriqueta:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Customer</title>
</head>

<?php include 'header.php';?>

<body class="banner">


    <div class="page-content">

        <!-- begining of the header content on the index page -->


        <div id="content">
            <div id="left">
                <div class="slogan">

                    <div class="banner-title before-login">
                        <h3>We Deliver Fresh, Natural and Organic Produce to your door!</h3>
                    </div>

                </div>

            </div>

            <div id="right">
                <div class="welcomepage-card">
                    <img class="rain-img" src="rain-128.png" width="40" height="40" alt="">
                    <br>
                    <div class="veges-rain">
                        <img src="images/sweet-pepper-24.png" alt="">
                        <img src="images/carrot-24.png" alt="">
                        <img src="images/chili-pepper-29-24.png" alt="">
                    </div>
                    <br>
                    <h1>Raining Vegetables</h1>
                    <br>
                    <p>First things first, yes, it's true I want your money.
                        But I want to give you great food in return Shop with me so I can meet your
                        food demands and you meet my money demands. Buy today!
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


        <!-- end of the top header content for the index page -->

        <div class="display-items before-login-bkgd" id="our-packages">

            <h1>Our Packages</h1>
            <br>
            <hr class="first-bar">
            <br>
            <div class="display-message">
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>

    </div>
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
        echo "<button onclick='window.location.href='process-purchase-btn.php''>Purchase Item</button>";

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

            <p>add a section for purchase in bulk</p>

        </div>

        <div class="banner-how-it-works" id="how-it-works">

            <div id="content">
                <div id="left">
                    <div class="content-how-it-works">

                        <h1>How it works</h1>
                        <br>
                        <hr class="first-bar">
                        <br>
                        <p> Every beginning of the week, we send out an email to our registered users letting you know
                            what
                            we have harvested by
                            our farmers for the current week’s Packages. Once an order has been made, you can not cancel
                            it
                            but can reschedule delivery.
                            The cut off is Wednesday at 12PM EST to skip or cancel an order for the next week. Please be
                            sure to
                            recycle your boxes and packing material. Your mobile money is charged at the time of
                            purchase.
                        </p>
                    </div>

                </div>

                <div id="right">
                    <div class="steps-how-it-works">
                        <h1>Step By Step</h1>
                        <br>
                        <hr>
                        <br>
                        <ul>
                            <img src="https://img.icons8.com/color/48/000000/beet.png" />
                            <li>We get our fresh produce from our organic farms</li>
                            <img src="https://img.icons8.com/color/48/000000/beet.png" />
                            <li>You create an account and choose your delivery frequency</li>
                            <img src="https://img.icons8.com/color/48/000000/beet.png" />
                            <li>Select your box size</li>
                            <img src="https://img.icons8.com/color/48/000000/beet.png" />
                            <li>We then deliver our simpliy organic products to your door step </li>
                        </ul>

                    </div>

                </div>
            </div>



        </div>

        <div class="banner-delivery" id="where-we-deliver">

            <div id="content">
                <div id="left">
                    <div class="content-delivery">

                        <h1>Where we deliver</h1>
                        <hr>

                        <p>residential areas and offices around kampala and Mbale</p>

                        <p> We use our farm transportation services for delivery needs and provide all customers with
                            tracking information.

                            We deliver between 3pm - 6pm on Friday and Saturday. Please input area to find out your
                            delivery
                            day. Don’t worry, if you miss this week’s cut off, be sure to still create an
                            account so you are on our email list for the following week's harvest!

                            *Please note: Delivery delay can be at the hands of Mother Nature due to weather, or traffic
                            delays, once the order leaves us it is in the hands of UPS. All damage reports must be made
                            to
                            hello@farmboxdirect.com within 24 hours of receiving your order and pictures may be
                            requested*
                        </p>


                    </div>

                    <div class="icon-delivery">
                        <img src="images/delivery-man.svg" alt="triangle with all three sides equal" height="87" width="100" />
                        <img src="images/delivery-truck.svg" alt="triangle with all three sides equal" height="87"
                            width="100" />

                    </div>

                </div>

            </div>



        </div>

        <div class="banner-contact-us" id="contact-us">

            <div id="content">
                <div id="left">
                    <div class="content-delivery">

                        <div class="contain">

                            <div class="wrapper">
                                <div class="form">
                                    <h1>Send us a message</h1>
                                    <br>
                                    <hr class="first-bar">
                                    <br><br>

                                    <form class="contact-input" action="">
                                        <p>
                                            <label for="">Your name</label>
                                            <input type="text">
                                        </p>
                                        <p>
                                            <label for="">Skype</label>
                                            <input type="text">
                                        </p>
                                        <p>
                                            <label for="">Email Address</label>
                                            <input type="text">
                                        </p>
                                        <p>
                                            <label for="">Topic</label>
                                            <input type="text">
                                        </p>
                                        <p>
                                            <label for="">Write your message</label>
                                            <textarea name="" id="" cols="30" rows="7"></textarea>
                                        </p>
                                        <p>
                                            <input type="submit" value="Send">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="right">
                    <div class="contact-info">

                        <h2>Mbale Ecological Farm</h2>
                        <p>123, Nabowa Road, Mbale, Uganda, Tell: +256 772 50601 </p>

                        <br>

                        <h2>Email Us</h2>
                        <p>Reach our customer service: mbalefarm@gmail.com</p>

                        <br>
                        <h2>Social Meida</h2>
                        <p>Follow us on social media coming soon</p>

                    </div>

                </div>
            </div>
        </div>
        <!-- end of contact us banner -->

        <?php include 'footer.php';?>

    </div>
    <!-- end of the page conent div  -->



    <!-- <div class="footer">
        <a href="contact.php">Need help?</a>
        <a href="subscribe.php">subscribe</a>
        <a href="about.php">About us</a>

        <a href="http://www.onlinewebfonts.com">oNline Web Fonts</a>
        <a href="https://icons8.com/icon/13299/beet">Beet icon by Icons8</a>
        <a href="https://www.flaticon.com/authors/itim2101" title="itim2101">itim2101</a> from <a
            href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
        <a href="https://www.flaticon.com/authors/photo3idea-studio" title="photo3idea_studio">photo3idea_studio</a>
        from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
    </div> -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <script>
    $(document).ready(function() {
        window.onscroll = function() {
            scrollFunction()
        };

    });
    </script>

</body>

</html>