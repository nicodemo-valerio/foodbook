<?php echo validation_errors(); ?>
<h1><?php echo $food['food'] ?></h1>
<?php
$hidden = array('id' => $food['id']);
echo form_open('food/edit/' . $food['id'])
?>
<label for="food">Name</label>
<input type="text" name="food" value="<?php echo $food['food'] ?>" id="food"/><br>
<label for="carbohydrates">Carbohydrates</label>
<input type="text" name="carb" value="<?php echo $food['carb'] ?>" id="carbohydrates"/><br>
<label for="proteins">Proteins</label>
<input type="text" name="prot" value="<?php echo $food['prot'] ?>" id="proteins"/><br>
<label for="fat">Fat</label>
<input type="text" name="fat" value="<?php echo $food['fat'] ?>" id="fat"/><br>
<label for="alcohol">Alcohol</label>
<input type="text" name="alcohol" value="<?php echo $food['alcohol'] ?>" id="alcohol" /><br>
<label for="price">Price for 100 g</label>
<input type="text" name="price" value="<?php echo $food['price'] ?>" id="price"/><br>
<p><input type="submit" name="submit" value="Update"/> | <a href="<?php echo(base_url('/food/index/')) ?>">Cancel</a> | <a href="<?php echo(base_url('/food/delete/' . $food['id'])) ?>">Delete</a> this food.</p>
</form>
