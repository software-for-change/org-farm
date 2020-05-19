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

    <label for="inputs"> Enter how many types of food you want to inventory. E.g if you will be addings rice and beans
        enter 2 </label>


    <?php
    echo "<select name='id'>";

    while ($row = $result->fetch_assoc()) {

        unset($shelf, $foodType);
        $shelf = $row['shelf_life'];
        $foodType = $row['food_type'];
        echo '<option value="' . $shelf . '">' . $foodType . '</option>';
    }

    echo "</select>";
    
    ?>
    <select id="inputs" style="width:60px;">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
    </select>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <script>
    $(document).ready(function() {


    });
    </script>

</body>

</html>