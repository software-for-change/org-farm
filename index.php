<?php
include_once "access-db.php";
session_start();

$sql = "SELECT food_name, food_id, price, food_image FROM farm_food";
$result = $conn->query($sql);

if (!isset($_SESSION["user_id"])) { //if login in session is not set then show the sign up form for notifications
    echo "<body onload='on()'>";
} else {
    echo "<body onload='off()'>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simply Organic</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
</head>

<body onload="on()" class="index-banner">
    <div class="content">
        <?php include 'header.php';?>


        <div class="w3-container">

            <div class="w3-display-container">
                <!-- the overlay for the email list form -->
                <div id="overlay">

                    <div class="w3-display-topright">
                        <a onclick="off()" >Close</a>
                    </div>
                    <div class="display-message">
                        <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                    </div>
                    <div class="email-list">
                    
                        <h1>COMING SOON!!!!!</h1>

                        <p>Before you check out the goodies we have coming for you, here give us your info so you are
                            the
                            first one to know when orders open</p>

                        <h3>Buy fresh vegetables and fruits and we will deliver them to your door step anywhere around
                            kampala</h3>

                        <form class="w3-container" method="POST" action="email-list.php">
                            <p>
                                <label>First & Last Name</label>
                                <input class="w3-input" name="names" type="text" required> </p>
                            <p>
                                <label>Email</label>
                                <input class="w3-input" name="email" type="text" required> </p>
                            <p>
                                <label>Phone Number</label>
                                <input class="w3-input" name="phone" type="number" required> </p>

                            <p> <input class="w3-button w3-orange" type="submit" value="Add me to the List">
                            </p>
                        </form>
                    </div>
                </div>

                <div class="w3-display-left how-link">
                    <a href="#how-it-works">How it works</a>
                </div>
                <div class="w3-display-bottomleft deliver-link">
                    <a href="#where-we-deliver"> Where we deliver</a>
                </div>

                <div class="w3-display-right sub-link"><a href="subscribe.php">Subscribe</a></div>
                <div class="w3-display-bottomright contact-link"><a href="#contact-us">Contact</a></div>


                <div class="w3-row index-header-content">
                    <h1 class="index-title w3-center">Raining Vegetables ! Sunny Fruits ...</h1>
                    <div class="w3-half w3-center">
                        <img src="images/index-image.png" alt="vegetables in basket">
                        <br>


                        <div>
                            <button class="w3-btn w3-black" onclick="on()">Get Notified when we start taking
                                orders</button>
                        </div>
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
                                <a class="order-btn" href="#customer/customer-login.php">.Order With Us.</a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="w3-container package-container">
            <div class="w3-display-container">


                <div class="w3-padding-64 display-package" id="our-packages">

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

        <div class="w3-container how-it-works-container">

            <div class="w3-display-container how-it-works-content">
                <div class="w3-display-topleft"><img src="images/orange.png" alt="orange"></div>
                <div class="w3-display-topright"><img src="images/pine-apple.png" alt="pineapple"></div>
                <div class="w3-display-bottomright"><img src="images/mango.png" alt="pineapple"></div>
                <div class="w3-display-bottomleft"><img src="images/banana.png" alt="pineapple"></div>



                <div id="how-it-works">

                    <div class="w3-row how-it-works-row">

                        <div class="w3-half">
                            <div class="content-how-it-works">

                                <h1>How it works</h1>

                                <p> Every beginning of the week, we send out an email to our registered users letting
                                    you know
                                    what
                                    we have harvested by
                                    our farmers for the current week’s Packages. Once an order has been made, you can
                                    not cancel
                                    it
                                    but can reschedule delivery.
                                    The cut off is Wednesday at 12PM EST to skip or cancel an order for the next week.
                                    Please be
                                    sure to
                                    recycle your boxes and packing material. Your mobile money is charged at the time of
                                    purchase.
                                </p>
                            </div>

                        </div>
                        <div class="w3-half">
                            <div class="steps-how-it-works">
                                <h1>Step By Step</h1>
                                <ol class="w3-center">
                                    <li>We get our fresh produce from our organic farms</li>
                                    <li>You create an account and choose your delivery frequency</li>
                                    <li>Select your box size</li>

                                    <li>We then deliver our simpliy organic products to your door step </li>
                                </ol>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="w3-container delivery-container">

            <div class="w3-display-container">



                <div class="banner-delivery" id="where-we-deliver">

                    <div class="w3-row">
                        <div class="content-delivery w3-center">

                            <h1>Where We Deliver</h1>

                            <p>We currently deliver to residential areas and offices around kampala and Mbale.</p>

                            <p> We use our farm transportation services for delivery needs and provide all customers
                                with
                                tracking information.

                                We deliver between 3pm - 6pm on Friday and Saturday. Please input area to find out your
                                delivery
                                day. Don’t worry, if you miss this week’s cut off, be sure to still create an
                                account so you are on our email list for the following week's harvest!

                                *Please note: Delivery delay can be due to Mother Nature depending on the weather, or
                                traffic
                                delays, once the order leaves for delivery. Any damages should be reported
                                to
                                samplemail@gmail.com within 24 hours of receiving your order with pictures*
                            </p>

                            <div class="icon-delivery w3-center w3-padding-64">
                                <img src="images/delivery-man.svg" alt="triangle with all three sides equal" height="87"
                                    width="100" />
                                <img src="images/delivery-truck.svg" alt="triangle with all three sides equal"
                                    height="87" width="100" />

                            </div>

                        </div>



                    </div>


                </div>

            </div>
        </div>


        <div class="w3-container contact-container">

            <div class="w3-display-container">



                <div class="banner-contact-us w3-padding-64" id="contact-us">

                    <div class="w3-row">

                        <h1 class="w3-center">Get in Touch With Us</h1>
                        <div class="w3-half w3-padding-32">
                            <form action="/action_page.php"
                                class="w3-container w3-card-4 w3-light-grey w3-text-deep-orange w3-margin">
                                <h2 class="w3-center">Contact Us</h2>

                                <div class="w3-row w3-section">
                                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                                    <div class="w3-rest">
                                        <input class="w3-input w3-border" name="first" type="text"
                                            placeholder="First Name">
                                    </div>
                                </div>

                                <div class="w3-row w3-section">
                                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                                    <div class="w3-rest">
                                        <input class="w3-input w3-border" name="last" type="text"
                                            placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="w3-row w3-section">
                                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i>
                                    </div>
                                    <div class="w3-rest">
                                        <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
                                    </div>
                                </div>

                                <div class="w3-row w3-section">
                                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
                                    <div class="w3-rest">
                                        <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone">
                                    </div>
                                </div>

                                <div class="w3-row w3-section">
                                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                                    <div class="w3-rest">
                                        <input class="w3-input w3-border" name="message" type="text"
                                            placeholder="Message">
                                    </div>
                                </div>

                                <button
                                    class="w3-button w3-block w3-section w3-deep-orange w3-ripple w3-padding">Send</button>

                            </form>


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