<?php echo validation_errors(); ?>
<h1><?php echo $title ?></h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('js/recipe-edit.js') ?>"></script>
<?php $number_of_ingredients = 1 ?>
<?php echo form_open('recipe/edit/' . $totals['id']) ?>
<input type="hidden" name="user-id" value="<?php echo($_SESSION['id']) ?>">
<label for="input-name">Name</label>
<input id="input-name" type="text" name="name" value="<?php echo $totals['name'] ?>"/><br>
<label for="input-portions">Portions</label>
<input id="input-portions" type="text" name="portions" value="<?php echo $totals['portions'] ?>"/><br>
<label for="input-weight">Final weight</label>
<input type="text" name="weight" id="input-weight"  value="<?php echo $totals['weight']['final'] ?>"/><br>
<hr>
<div id="ingredients">
  <h3>Ingredients</h3>
  <?php
  $food_names = array();
  $recipe_foods = array();
  //ingredients of the recipe
  foreach ($totals['ingredients'] as $ingredient)
  {
      array_push($recipe_foods, $ingredient['food']);
  }
  //ingredients dropdown don't have ingredients of the recipe
  foreach ($totals['foods'] as $ingredient)
  {
      if (!in_array($ingredient['food'], $recipe_foods))
      {
          $food_names[$ingredient['id']] = $ingredient['food'];
      }
  }
  asort($food_names);
  $id = 'id="select-ingredient"';
  ?>

  <input type="hidden" name="number-of-ingredients" value="<?php echo count($totals['ingredients']) ?>" id="id-number-of-ingredients"/>
  <table id="table-ingredients">
    <thead><tr><th>Food</th><th>Quantity (g)</th><th>Options</th></tr></thead>  
    <tbody>
      <tr id="tr-add-ingredient"><td><?php
              echo form_dropdown('food-id', $food_names, 'apple', $id)
              ?></td><td><input id="button-add-ingredient" type="button" value="Add"/></td><td>&nbsp;</td></tr> 
          <?php foreach ($totals['ingredients'] as $ingredient): ?>
          <tr id="tr-ingredient-<?php echo $number_of_ingredients ?>">
            <td><?php echo $ingredient['food'] ?><input name="food-id-<?php echo $number_of_ingredients ?>" value="<?php echo $ingredient['food_id'] ?>" type="hidden"></td>
            <td><input id="quantity-<?php echo $number_of_ingredients ?>" name="quantity-<?php echo $number_of_ingredients ?>" value="<?php echo $ingredient['quantity'] ?>" type="text"></td>
            <td><span id="remove-ingredient-<?php echo $number_of_ingredients ?>">Remove</span></td>
            <?php $number_of_ingredients++; ?>
          </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<div id="div-ingredients"></div>
<hr>
<label for="input-instructions">Instructions</label>
<?php
$data = array('name' => 'instructions', 'rows' => '6', 'cols' => '70');
$value = $totals['instructions'];
$extra = 'id="input-instructions"';
echo form_textarea($data, $value, $extra);
echo form_hidden('user_id', 1);
?>
<p><input type="submit" name="submit" value="Update"/> | <a href="<?php echo base_url('/recipe/view/' . $totals['id']) ?>">Cancel</a> | <a href="<?php echo base_url('/recipe/delete/' . $totals['id']) ?>">Delete</a></p>
</form>
