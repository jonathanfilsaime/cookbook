<?php require_once("functions.php");?>
<?php $connection = connectDB()?>
<?php
$query  = queryIngredient(2);

$result = mysqli_query($connection, $query);
// Test if there was a query error
if (!$result) {
    die("Database query failed.");
}

$query1  = queryMeasurment(2);

$result1 = mysqli_query($connection, $query1);
// Test if there was a query error
if (!$result1) {
    die("Database query failed.");
}

$query2  = recipeName(2);

$result2 = mysqli_query($connection, $query2);
// Test if there was a query error
if (!$result2) {
    die("Database query failed.");
}

$query3  = getIngredient();

$result3 = mysqli_query($connection, $query3);
// Test if there was a query error
if (!$result3) {
    die("Database query failed.");
}
?>


    <DOCTYPE!>
    <html>
    <head></head>
    <title>CookBook</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <body>
    <div class="header">
        <h1><a href="index.php">The cookbook</a></h1>
    </div>

    <div class="main">

        <a href="veganMeatball.php"><img src="veganMeatball" height="200" width="200" class="img"></a>
        <?php
        // 3. Use returned data (if any)
        while($name = mysqli_fetch_assoc($result2)){
            echo "<h2>" . $name["name"] . "</h2>"; ?> </br> <?php
        }

        ?>

        <?php releaseResult($result2)?>

        <?php
        echo "<div class=\"right_column\">";
        // 3. Use returned data (if any)
        while($ingredient = mysqli_fetch_assoc($result)){
            echo "<li>" . $ingredient["name"] . "</li>"; ?> </br> <?php
        }
        echo "</div>";
        ?>

        <?php releaseResult($result)?>

        <?php
        echo "<div class=\"right_column\">";
        // 3. Use returned data (if any)
        while($measurment = mysqli_fetch_assoc($result1)){
            echo "<li>" . $measurment["name"] . "</li>"; ?> </br> <?php
        }
        echo "</div>";
        ?>

        <?php releaseResult($result1)?>
    </div>

    <div class="aside">
        <h3>Category</h3>
        <ul style="list-style-type:none">
            <li><a href="vegan.php">Vegan</a></li>
            <li><a href="Vegetarian.php">Vegeterian</a></li>
            <li><a href="WithMeat.php">With-meat</a></li>
        </ul>
        <h3>Menu</h3>
        <ul style="list-style-type:none">
            <li><a href="Breakfast.php">Breakfast</a></li>
            <li><a href="Lunch.php">Lunch</a></li>
            <li><a href="Dinner.php">Dinner</a></li>
        </ul>
        <h3>Ingredient</h3>
        <ul style="list-style-type:none">
            <?php
            while($ingredient = mysqli_fetch_assoc($result3)){
                echo "<li><a href=\"{$ingredient["name"]}.php\">" . $ingredient["name"] . "</a></li>";
            }
            ?>
        </ul>
    </div>
    <?php releaseResult($result3)?>


    </body>
    </html>

<?php
closeConnection($connection);
?>