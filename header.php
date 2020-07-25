<?php
session_start();

if (!isset($_SESSION['user_id'])) { //if login in session is not set

    echo "
    <ul class='topnav'>
                <li><a class='logo' href='index.php'>Raining Vegetables</a></li>
               
                <li class='right'><a href='#contact-us'>Contact</a></li>
                <li class='right'><a href='#where-we-deliver'>Delivery</a></li>
                // <li class='right'><a href='about.php'>About</a></li>
                // <li class='right'><a href='subscribe.php'>Subscribe</a></li>
                <li class='right'><a href='customer/customer-login.php'>Login</a></li>
                
            </ul>
            <!-- mobile navigation -->
            <div id='mySidepanel' class='sidepanel'>
                <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>×</a>
               <a href='#contact-us'>Contact</a>
               <a href='#where-we-deliver'>Delivery</a>
               <a href='about.php'>About</a>
               <a href='subscribe.php'>Subscribe</a>
               <a href='customer/customer-login.php'>Login</a>
            </div>
            <button class='openbtn mobile-nav' onclick='openNav()'>☰ Menu </button>
";
} else {

    echo "
    <ul class='topnav'>
                <li><a class='logo' href='index.php'>Raining Vegetables</a></li>
               
                <li class='right'><a class='active' href='index.php'>Home</a></li>
                <li class='right'><a href='shopping-cart'>shopping cart</a></li>
                <li class='right'><a href='#our-packages'>Packages</a></li>
                <li class='right'><a href='#contact-us'>Contact</a></li>
                <li class='right'><a href='#where-we-deliver'>Delivery</a></li>
                <li class='right'><a href='about.php'>About</a></li>
                <li class='right'><a href='subscribe.php'>Subscribe</a></li>
                <li class='right'><a href='logout.php'>logout</a></li>
            </ul>
            <!-- mobile navigation -->
            <div id='mySidepanel' class='sidepanel'>
                <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>×</a>
                <a class='logo' href='index.php'>Raining Vegetables</a>
               
                <a href='shopping-cart'>shopping cart</a>
                <a href='#our-packages'>Packages</a>
                <a href='#contact-us'>Contact</a>
                <a href='#where-we-deliver'>Delivery</a>
                <a href='about.php'>About</a>
                <a href='subscribe.php'>Subscribe</a>
                <a href='../logout.php'>logout</a>
            </div>
            <button class='openbtn mobile-nav' onclick='openNav()'>☰ Menu </button>
";

}

// when nav bar for desktop size


