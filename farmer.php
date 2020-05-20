<?php
   include_once "access-db.php";

   $sql = "SELECT food_type, shelf_life FROM farm_produce";
   $result = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simply Organic</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
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

    <label for="inputs"> Enter how many types of food you want to inventory.
    </label>
    <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>
    <br><br>
    <?php
    echo "<select name='id' multiple=''>";

    while ($row = $result->fetch_assoc()) {

        unset($shelf, $foodType);
        $shelf = $row['shelf_life'];
        $foodType = $row['food_type'];
        echo '<option value="' . $shelf . '">' . $foodType . '</option>';
    }

    echo "</select>";
    echo "<br>";
    echo "<input type='submit'>";
    
    ?>


    <h1>enter the quantity for the foods you wish to add</h1>
    <?php

        if ($result->num_rows > 0) {
            echo "<form>";
            echo "<table class='prodcue-table'><tr style='height: 80px'><th style='text-align:left'> Food Type </th><th style='text-align:left'> Quantity </th></tr><br><br>";
            // output data of each row
            while($row = mysqli_fetch_array($result)) {
                echo "<p>did we get here</p>";
                echo "<tr style='height: 40px'>
                    <td>" .$row["food_type"]. "</td>
                    <td> <input type='text'></td>
                    
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