<?php echo validation_errors(); ?>
<h1><?php echo $title ?></h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('js/meal-insert.js') ?>"></script>
<?php echo form_open('meal/insert') ?>
<input type="hidden" name="user-id" value="<?php echo $_SESSION['id'] ?>"/>
<label for="input-recipe-name">Name</label>
<input type="text" name="name" id="input-recipe-name"/><br>
<label for="input-recipe-portions">Portions</label>
<input type="text" name="portions" id="input-recipe-portions" value="1"/><br>
<label for="input-recipe-description">Description</label>
<input type="text" name="description" id="input-recipe-description"/><br>
<hr>
<div id="recipes">
  <h2>Recipes</h2>
  <input type="hidden" name="number-of-recipes" value="0" id="id-number-of-recipes"/>
  <?php
  if (!empty($recipes))
  {
      $recipes_names = array();
      foreach ($recipes as $totals)
      {
          $recipe_names[$totals['id']] = $totals['name'];
      }
      asort($recipe_names);
      $recipeId = 'id="select-recipe"';
      echo form_dropdown('recipe-id', $recipe_names, '', $recipeId);
      echo '<input id = "button-add-recipe" type = "button" value = "Add"/>';
  }
  else
  {
      echo "<p>You haven't saved any recipe yet</p>";
  }
  ?>
</div>
<hr>
<div id="ingredients">
  <h2>Ingredients</h2>
  <p><input type="hidden" name="number-of-ingredients" value="0" id="id-number-of-ingredients"/>
      <?php
      $food_names = array();
      foreach ($foods as $ingredient)
      {
          $food_names[$ingredient['id']] = $ingredient['food'];
      }
      asort($food_names);
      ?>
      <?php
      $id = 'id="select-ingredient"';
      echo form_dropdown('food-id', $food_names, 'apple', $id);
      ?>
    <input id="button-add-ingredient" type="button" value="Add"/></p>
</div>
<p><input type="submit" name="submit" value="Insert new meal"/></p>
