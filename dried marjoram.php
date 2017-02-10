<?php require_once("functions.php");?>
<?php $connection = connectDB()?>
<?php
$query  = getIngredient();

$result = mysqli_query($connection, $query);
// Test if there was a query error
if (!$result) {
    die("Database query failed.");
}

$query1 = queryRecipeByIngredient(17);

$result1 = mysqli_query($connection, $query1);
// Test if there was a query error
if (!$result1) {
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
        <?php
        $count = 1;

        while($ingredient = mysqli_fetch_assoc($result1))
        {
            if(strcmp($ingredient["name"], "Vegan Meatball Subs") == 0){
                echo "<a href=\"veganMeatball.php\"><img src=\"veganMeatball\" height=\"200\" width=\"200\" class=\"img\"></a>";
            }
            if(strcmp($ingredient["name"], "Avocado Cream Pasta") == 0){
                echo "<a href=\"AvocadoCreamPasta.php\"><img src=\"AvocadoPestoPasta\" height=\"200\" width=\"200\" class=\"img\"></a>";
            }
            if(strcmp($ingredient["name"], "Tofu Scramble") == 0){
                echo "<a href=\"tofuscramble.php\"><img src=\"tofuscramble\" height=\"200\" width=\"200\" class=\"img\"></a>";
            }
            if(strcmp($ingredient["name"], "Sunny Breakfast Sausage") == 0){
                echo "<a href=\"SunnySpicyBreakfastSausage.php\"><img src=\"SunnySpicyBreakfastSausage\" height=\"200\" width=\"200\" class=\"img\"></a>";
            }
            if(strcmp($ingredient["name"], "Breakfast Sausage") == 0){
                echo "<a href=\"BreakfastSausage.php\"><img src=\"BreakfastSausage\" height=\"200\" width=\"200\" class=\"img\"></a>";
            }
            if(strcmp($ingredient["name"], "Club Chicken Wraps") == 0){
                echo "<a href=\"CaliforniaClubChickenWraps.php\"><img src=\"CaliforniaClubChickenWraps.jpg\" height=\"200\" width=\"200\" class=\"img\"></a>";
            }
            if($count % 3 == 0){
                echo "</br>";
            }
            $count += 1;
        }
        ?>

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
            while($ingredient = mysqli_fetch_assoc($result)){
                echo "<li><a href=\"{$ingredient["name"]}.php\">" . $ingredient["name"] . "</a></li>";
            }
            ?>
        </ul>
    </div>
    <?php releaseResult($result)?>
    <?php releaseResult($result1)?>


    </body>
    </html>

<?php
closeConnection($connection);
?>