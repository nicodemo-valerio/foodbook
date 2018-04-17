<?php echo validation_errors(); ?>

<h1><?php echo $title ?></h1>

<?php echo form_open('user/insert') ?>
<label for="username">Username</label>
<input type="text" name="username" id="username" value="<?php echo set_value('username')?>"/><br>

<label for="email">email</label>
<input type="text" name="email" id="email" value="<?php echo set_value('email')?>"/><br>

<label for="password">Password</label>
<input type="password" name="password" id="password" value="<?php echo set_value('password')?>"/><br>

<label for="height">Height in cm</label>
<input type="text" name="height" id="height" value="<?php echo set_value('height')?>"/><br>

<label for="weight">Weight in kg</label>
<input type="text" name="weight" id="weight" value="<?php echo set_value('weight')?>"/><br>

<label for="weight_goal">Weight goal</label>
<input type="text" name="weight_goal" id="weight_goal" value="<?php echo set_value('weight_goal')?>"/><br>

<input type="submit" name="submit" value="Sign up"/>
</form>