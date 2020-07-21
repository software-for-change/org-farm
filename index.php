<?php
include_once "access-db.php";
session_start();

$sql = "SELECT food_name, food_id, price, food_image FROM farm_food";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simply Organic</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Enriqueta:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
</head>

<body class="index-banner">
    <div class="content">
        <?php include 'header.php';?>


        <div class="w3-container">
            <div class="w3-display-container">
                <div class="w3-display-left how-link">
                    <a  href="#how-it-works">How it works</a>
                </div>
                <div class="w3-display-bottomleft deliver-link">
                    <a href="#where-we-deliver"> Where we deliver</a>
                </div>

                <div class="w3-display-right sub-link"><a href="subscribe.php">Subscribe</a></div>
                <div class="w3-display-bottomright contact-link"><a href="#contact-us">contactus@gmail.com</a></div>
                <div class="w3-display-bottommiddle w3-hide-small">
                    <div class="vl"></div>
                </div>


                <div class="w3-row index-header-content">
                    <h1 class="index-title w3-center">Raining Vegetables ! Sunny Fruits ...</h1>
                    <div class="w3-half w3-center">



                        <img src="images/index-image.png" alt="vegetables in basket">
                        <br>

                    </div>
                    <div class="w3-half">
                        <div class="welcomepage-card">
                            <img class="rain-img" src="images/rain-128.png" width="40" height="40" alt="">
                            <br>
                            <div class="veges-rain">
                                <img src="images/sweet-pepper-24.png" alt="">
                                <img src="images/carrot-24.png" alt="">
                                <img src="images/chili-pepper-29-24.png" alt="">
                            </div>
                            <br>
                            <h1>Raining Vegetables</h1>
                            <br>
                            <p>We sell fresh, organic fruits and vegetables grown on your farms.
                                With an option to join our subscription plan or a choice to buy whenever you want, you
                                can
                                purchase a package of fresh furits and vegetables.
                                food demands and you meet my money demands. Buy today!
                            </p>
                            <br>

                            <div class="group-buttons">
                                <a class="order-btn" href="#our-packages">.Order With Us.</a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="w3-container package-container">
            <div class="w3-display-container">


                <div class="display-items w3-padding-64 before-login-bkgd" id="our-packages">

                    <a href="" class="w3-display-topright w3-padding-48">Purchase produce in large bulk instead?</a>
                    <h1 class="w3-display-topmiddle w3-padding-48">Our Packages</h1>

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

                    echo "<div class='w3-row w3-padding-64'>";
                    

                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='w3-third'>";
                        echo "<form method='post' action='process-purchase-btn.php'>";

                        $food_name = $row["food_name"];
                        $food_image = $row["food_image"];
                        $price = $row["price"];
                        $food_id = $row["food_id"];

                        echo "<div class='food-item'>";

                        
                        echo '<img height="400" width="400" src="data:image/jpg;base64,' . base64_encode($row['food_image']) . '" />';
                        echo "
                                                    <div class='food-post'>
                                                    <p> " . $food_name . " </p>
                                                    <p> $" . $price . " </p>";
                                                    echo "<input name='package_id'  type='hidden' value='$food_id' >";
                        echo "<input type='submit' class='submit-button' value='Purchase Item'>";

                        echo "<br>";

                        echo "</div>";
                        echo "</div>";
                        
                        echo "</form>";
                        echo "</div>";
                        
                        
                       
                    }
                    
                    echo "</div>";

                } else {
                    echo "0 results";
                }
                ?>
                </div>
            </div>
        </div>

        <div class="banner-how-it-works" id="how-it-works">

            <div class="w3-row">

                <div class="w3-half">
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
                <div class="w3-half">
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

            <div class="w3-row">
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
                    <img src="images/delivery-man.svg" alt="triangle with all three sides equal" height="87"
                        width="100" />
                    <img src="images/delivery-truck.svg" alt="triangle with all three sides equal" height="87"
                        width="100" />

                </div>


            </div>


        </div>

        <div class="banner-contact-us" id="contact-us">

            <div class="w3-row">
                <div class="w3-half">
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
                <div class="w3-half">
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

    </div>
    <?php include 'footer.php';?>
    <!-- end of the page conent div  -->

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