<?php
session_start();
include_once "access-db.php";

// if(!isset($_SESSION["user_id"])){ //if login in session is not set
//     header("location:index.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>The Wasolo</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="content">
        <?php include 'header.php';?>

        <div class="w3-center">



        </div>
    </div>
    <?php include 'footer.php';?>
    <script src="js/index.js"></script>
    <script>
    $(document).ready(function() {



    });
    </script>


</body>

</html>