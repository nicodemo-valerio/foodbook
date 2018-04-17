<?php echo validation_errors(); ?>
<h1><?php echo $title ?></h1>
<p>Input data for 100 g of product.</p>
<?php echo form_open('food/insert') ?>
<label for="food">Name</label>
<input type="text" name="food" id="food" value="<?php
if (set_value('food')) {
    echo set_value('food');
} else {
    echo "";
}
?>"/><br>
<label for="carbohydrates">Carbohydrates</label>
<input type="text" name="carb" id="carbohydrates" value="<?php
if (set_value('carb')) {
    echo set_value('carb');
} else {
    echo "0";
}
?>"/><br>

<label for="proteins">Proteins</label>
<input type="text" name="prot" id="proteins" value="<?php
if (set_value('carb')) {
    echo set_value('carb');
} else {
    echo "0";
}
?>"/><br>

<label for="fat">Fat</label>
<input type="text" name="fat" id="fat"  value="<?php
if (set_value('fat')) {
    echo set_value('fat');
} else {
    echo "0";
}
?>"/><br>

<label for="alcohol">Alcohol</label>
<input type="text" name="alcohol" id="alcohol" value="<?php
if (set_value('alcohol')) {
    echo set_value('alcohol');
} else {
    echo "0";
}
?>"/><br>

<label for="price">Price</label>
<input type="text" name="price" id="price"  value="<?php
if (set_value('price')) {
    echo set_value('price');
} else {
    echo "0";
}
?>"/><br>
<input type="submit" name="submit" value="Insert new food"/>
</form>
