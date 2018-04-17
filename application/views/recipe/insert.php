<?php echo validation_errors(); ?>
<h1><?php echo $title ?></h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('js/recipe-insert.js') ?>"></script>
<?php echo form_open('recipe/insert') ?>
<input type="hidden" name="user-id" value="<?php echo $_SESSION['id'] ?>">
<label for="input-recipe-name">Name</label>
<input type="text" name="name" id="input-recipe-name"/></br>
<label for="input-portions">Portions</label>
<input type="text" name="portions" id="input-portions" value="1"/></br>
<label for="input-weight">Final weight</label>
<input type="text" name="weight" id="input-weight" value="0"/></br>
<hr>
<div id="ingredients">
  <label>Ingredients</label><br>
  <input type="hidden" name="number-of-ingredients" value="0" id="id-number-of-ingredients"/>
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
  echo form_dropdown('food-id-', $food_names, '', $id);
  ?>
  <input id="button-add-ingredient" type="button" value="Add"/>
</div>
<div id="div-ingredients"></div>
<hr>
<label for="instructions">Instructions</label>
<?php
$data = array('name' => 'instructions', 'rows' => '6', 'cols' => '70');
$value = 'Insert here the recipe';
echo form_textarea($data, set_value("instructions"));
echo form_hidden('user_id', 1);
?>
<br>
<input type="submit" name="submit" value="Insert new recipe"/>
</form>
