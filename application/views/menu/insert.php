<?php echo validation_errors(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url('js/menu-insert.js') ?>"></script>
<h1><?php echo $title ?></h1>
<?php echo form_open('menu/insert') ?>
<input type="hidden" name="user-id" value="<?php echo $_SESSION['id'] ?>"/>
<label for="name">Name</label>
<input type="text" name="name" id="name"/><br>
<label for="date">Date</label>
<input type="text" name="date" id="date" value="<?php echo date('Y-m-d') ?>"/><br>
<label for="description">Description</label>
<input type="text" name="description" id="description"/><br>
<!-- select meals -->
<div id="div-meals">
  <label>Meals</label><br>
  <input type="hidden" name="number-of-meals" value="0" id="id-number-of-meals"/>
  <?php if (empty($meals)): ?>
      <p>You haven't created any meal yet.</p>
  <?php else : ?>
      <?php
      $meal_names = array();
      foreach ($meals as $meal)
      {
          $meal_names[$meal['id']] = $meal['name'];
      }
      asort($meal_names);
      $meal_id = 'id="select-meal"';
      echo form_dropdown('meal-id', $meal_names, '', $meal_id);
      ?>
      <input id="button-add-meal" type="button" value="Add"/>
  <?php endif; ?>

</div>
<input type="submit" name="submit" value="Create"/>
</form>