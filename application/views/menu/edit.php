<?php echo validation_errors(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('js/menu-edit.js') ?>"></script>
<h1><?php echo $title ?></h1>
<?php echo form_open('menu/edit/' . $menu[0]['id']) ?>
<input type="hidden" name="meal-id" value="<?php echo($menu[0]['id']) ?>"/>
<input type="hidden" name="user-id" value="<?php echo($_SESSION['id']) ?>"/>
<label for="name">Name</label>
<input type="text" name="name" id="name" value="<?php echo($menu[0]['menu']) ?>"/><br>
<label for="date">Date</label>
<input type="text" name="date" id="date" value="<?php echo ($menu[0]['date']) ?>"/><br>
<label for="description">Description</label>
<input type="text" name="description" id="description" value="<?php echo ($menu[0]['description']) ?>"/><br>
<h2>Meals</h2>
<input type="hidden" name="number-of-meals" value="<?php echo (count($menu)) ?>" id="number-of-meals"/>
<?php
$meal_names = array();
$inserted_meals = array();
foreach ($menu as $inserted_meal)
{
    array_push($inserted_meals, $inserted_meal['meal_id']);
}
foreach ($meals as $meal)
{
    if (!in_array($meal['id'], $inserted_meals))
    {
        $meal_names[$meal['id']] = $meal['name'];
    }
}
asort($meal_names);
$meal_id = 'id="select-meal"';
?>
<table>
  <thead><tr><th>Meal</th><th>Options</tr></thead>
  <tbody>
      <?php $counter = 1; ?>
      <?php foreach ($menu as $current_meal): ?>
        <tr id="tr-meal-<?php echo $counter ?>">
          <td><?php echo($current_meal['name']) ?>
            <input type="hidden" id="input-meal-<?php echo $counter ?>" name="meal-id-<?php echo($counter) ?>" value="<?php echo($current_meal['meal_id']) ?>"/> </td>
          <td><span id="remove-meal-<?php echo $counter ?>">Remove</span></td>
        </tr>
        <?php $counter++ ?>
    <?php endforeach; ?>
    <tr id="tr-add">
      <td><?php echo form_dropdown('meal-id', $meal_names, '', $meal_id) ?></td>
      <td><input id="button-add-meal" type="button" value="Add"/></td>
    </tr>
  </tbody>
</table>
<p><input type="submit" name="submit" value="Update"/>  | <a href="<?php echo base_url('/menu/view/' . $menu[0]['id']) ?>">Cancel</a> | <a href="<?php echo base_url('/menu/delete/' . $menu[0]['id']) ?>">Delete</a> this menu.</p>
</form>