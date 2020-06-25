<?php
session_start();

if (!isset($_SESSION['user_id'])) { //if login in session is not set

    echo "
    <div class='sidebar'>
    <a class='active' href='index.php'><img src='images/logo.png'></a>
    <a class='active' href='index.php'>Home</a>
    <a href='#our-packages'>Packages</a>
    <a href='#contact-us'>Contact</a>
    <a href='about.php'>About</a>
    <a href='subscribe.php'>Subscribe</a>
    <a href='customer/customer-login.php'>Login</a>
    </div>

";
} else {

    echo "
    <div class='header' id='myHeader'>
    <div class='menu_navbar'>
        <ul>
            <li><a class='navlink' href='shopping-cart'>shopping cart</a> </li>
            <li><a class='navlink' href='#our-packages'>Packages</a> </li>
            <li><a class='navlink' href='#contact-us'>Contact</a> </li>
            <li><a class='navlink' href='#where-we-deliver'>Delivery</a> </li>
            <li><a class='navlink' href='about.php'>About</a> </li>
            <li><a class='navlink' href='subscribe.php'>Subscribe</a> </li>
            <li><a class='navlink' href='../logout.php'>logout</a> </li>
        </ul>
    </div>

    <div class='logo'>
        <h2 class='logo'> <a href='index.php'><img src='images/logo.png'></a> </h2>
    </div>
    </div>

";

}
