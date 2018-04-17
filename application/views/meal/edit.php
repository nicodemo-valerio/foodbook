<?php echo validation_errors(); ?>
<h1><?php echo $title ?></h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('js/meal-edit.js') ?>"></script>
<?php
$number_of_ingredients = 1;
$number_of_recipes = 1;
?>
<?php echo form_open('meal/edit/' . $meal['id']) ?>
<input type="hidden" name="user-id" value="<?php echo($_SESSION['id']) ?>"/>
<label for="input-recipe-name">Name</label>
<input type="text" name="name" id="input-recipe-name" value="<?php echo($meal['name']) ?>"/><br>
<label for="input-recipe-portions">Portions</label>
<input type="text" name="portions" id="input-recipe-portions" value="<?php echo($meal['portions']) ?>"/><br>
<label for="input-recipe-description">Description</label>
<input type="text" name="description" id="input-recipe-description" value="<?php echo($meal['description']) ?>"/><br>
<hr>
<input type="hidden" name="number-of-recipes" value="<?php echo(count($meal_recipes)) ?>" id="id-number-of-recipes"/>

<h3>Recipes</h3>
<ul>
    <?php $recipe_counter = 1 ?>
    <?php foreach ($meal_recipes as $totals): ?>
      <li id="li-recipe-<?php echo($recipe_counter) ?>">
          <?php $recipe_id = $totals['id'] ?>
        <?php echo($totals['name']) ?> [<span id="remove-recipe-<?php echo($recipe_counter) ?>">Remove</span>]
        <input type="hidden" name="recipe-id-<?php echo $recipe_counter ?>" 
               id="recipe-id-<?php echo $recipe_counter ?>" 
               value="<?php echo $recipe_id ?>"/>
               <?php $recipe_counter++ ?>
           <?php endforeach; ?>
  </li>
</ul>
<?php
$recipes_names = array();
$inserted_recipes = array();
foreach ($meal_recipes as $recipe)
{
    array_push($inserted_recipes, $recipe['id']);
}
foreach ($recipes as $totals)
{
    if (!in_array($totals['id'], $inserted_recipes))
    {
        $recipe_names[$totals['id']] = $totals['name'];
    }
}
asort($recipe_names);
?>
<?php
$recipeId = 'id="select-recipe"';
echo form_dropdown('recipe-id', $recipe_names, '', $recipeId);
?>
<input id="button-add-recipe" type="button" value="Add"/>
<hr>

<div id="ingredients">
  <h3>Ingredients</h3>
  <input type="hidden" name="number-of-ingredients" value="<?php echo(count($meal_foods)) ?>" id="id-number-of-ingredients"/>
  <table id="table-ingredients">
    <thead>
      <tr><th>Ingredient</th><th>Quantity (g)</th><th>&nbsp;</th></tr>
    </thead>
    <?php foreach ($meal_foods as $food): ?>
        <tr id="tr-ingredient-<?php echo($number_of_ingredients) ?>">
          <td><?php echo($food['food']) ?>
            <input type="hidden" name="food-id-<?php echo($number_of_ingredients) ?>" value="<?php echo($food['id']) ?>"></td>
          <td><input type="text" id="quantity-<?php echo($number_of_ingredients) ?>" name="quantity-<?php echo($number_of_ingredients) ?>" value="<?php echo($food['quantity']) ?>"></td>
          <td><span id="remove-ingredient-<?php echo($number_of_ingredients) ?>">Remove</span></td>
        </tr>
        <?php $number_of_ingredients++ ?>
    <?php endforeach; ?>
    <tr id="row-add-ingredient">
      <td>
          <?php
          $food_names = array();
          $recipe_foods = array();
          //ingredients of the recipe
          foreach ($meal_foods as $ingredient)
          {
              array_push($recipe_foods, $ingredient['food']);
          }
          //ingredients dropdown don't have ingredients of the recipe
          foreach ($foods as $ingredient)
          {
              if (!in_array($ingredient['food'], $recipe_foods))
              {
                  $food_names[$ingredient['id']] = $ingredient['food'];
              }
          }
          asort($food_names);
          ?>
          <?php
          $id = 'id="select-ingredient"';
          echo form_dropdown('food-id', $food_names, 'apple', $id);
          ?>
      </td>
      <td><input id="button-add-ingredient" type="button" value="Add"/></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<p><input type="submit" name="submit" value="Update"/> | <a href="<?php echo base_url('/meal/view/' . $meal['id']) ?>">Cancel</a> | <a href="<?php echo base_url('/meal/delete/' . $meal['id']) ?>">Delete</a></p>
</form>
