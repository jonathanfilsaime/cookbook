<?php
function connectDB(){
		define("DB_SERVER", "127.0.0.1:3306");
		define("DB_USER", "jonathanfilsaime");
		define("DB_PASS", "j1filsaime01");
		define("DB_NAME", "cookbook");

	  // 1. Create a database connection
	  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	  // Test if connection succeeded
	  if(mysqli_connect_errno()) {
	    die("Database connection failed: " . 
	         mysqli_connect_error() . 
	         " (" . mysqli_connect_errno() . ")"
	    );
	  }else{
		  return $connection;
	  }
	
}

function releaseResult($result){
  // 4. Release returned data
  mysqli_free_result($result);
}

function closeConnection($connection){
	
	  // 5. Close database connection
	  mysqli_close($connection);
}

function recipeName($recipeId){
    $query = "SELECT * FROM Recipe WHERE id = $recipeId;";
    return $query;

}

function queryIngredient($recipeId){
	$query  = "SELECT name FROM RecipeIngredient JOIN Ingredient WHERE recipe_id = {$recipeId} && (RecipeIngredient.ingredient_id0 = Ingredient.id || RecipeIngredient.ingredient_id1 = Ingredient.id || RecipeIngredient.ingredient_id2 = Ingredient.id || RecipeIngredient.ingredient_id3 = Ingredient.id || RecipeIngredient.ingredient_id4 = Ingredient.id);";
	
	return $query;
}

function queryMeasurment($recipeId){
	$query = "SELECT name FROM RecipeIngredient JOIN Measure WHERE recipe_id = {$recipeId} && (RecipeIngredient.measure_id0 = Measure.id || RecipeIngredient.measure_id1 = Measure.id || RecipeIngredient.measure_id2 = Measure.id || RecipeIngredient.measure_id3 = Measure.id || RecipeIngredient.measure_id4 = Measure.id );";
	return $query;
}

function getIngredient(){
    $query = "SELECT * FROM Ingredient;";
    return $query;
}

function queryRecipeNameByCategoryVegan(){
    $query = "SELECT name FROM Recipe WHERE vegan = 1;";
    return $query;
}

function queryRecipeNameByCategoryVegeterian(){
    $query = "SELECT name FROM Recipe WHERE vegeterian = 1;";
    return $query;
}

function queryRecipeNameByCategoryWithMeat(){
    $query = "SELECT name FROM Recipe WHERE with_meat = 1;";
    return $query;
}

function queryRecipeBreakfast(){
    $query = "SELECT name FROM Recipe WHERE breakfast = 1;";
    return $query;
}

function queryRecipeLunch(){
    $query = "SELECT name FROM Recipe WHERE lunch = 1;";
    return $query;
}

function queryRecipeDinner(){
    $query = "SELECT name FROM Recipe WHERE dinner = 1;";
    return $query;
}

function queryRecipeByIngredient($ingredient){
    $query = "SELECT name FROM Recipe JOIN RecipeIngredient ON Recipe.id = RecipeIngredient.recipe_id WHERE (ingredient_id0 = {$ingredient} || ingredient_id1 = {$ingredient} 
                                                      || ingredient_id2 = {$ingredient} || ingredient_id3 = {$ingredient} || ingredient_id4 = {$ingredient});";
    return $query;
}

?>