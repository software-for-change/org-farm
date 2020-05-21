<?php
   include_once "../access-db.php";

   $sql = "SELECT food_type, shelf_life FROM farm_produce";
   $result = $conn->query($sql);

   $data = "UPDATE farm_produce SET quantity='".$_POST['quantity']."' WHERE id=6";
    echo 'did we get here';
   if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE farm_produce set quantity='" . $_POST['quantity'] . "' WHERE id=7");
    $message = "Record Modified Successfully";
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simply Organic</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
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

    <h1> Farmer's Inventory </h1>

    <h1>enter the quantity for the foods you wish to add</h1>
    <?php

        if ($result->num_rows > 0) {
            echo "<form method='post' action=''>";
            echo "<table class='prodcue-table'><tr style='height: 80px'><th style='text-align:left'> Food Type </th><th style='text-align:left'> Quantity </th></tr><br><br>";
            
            // output data of each row
            while($row = mysqli_fetch_array($result)) {
               
                echo "<tr style='height: 40px'>
                    <td>" .$row["food_type"]. "</td>
                    <td> <input name='quantity' type='text'></td>
                    
                </tr>";
            }
            echo "</table>";
            echo "<input type='submit' vale='submit'>";
            echo "</form>";

        } else {
            echo "0 results";
        }
    ?>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>