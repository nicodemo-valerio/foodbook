<?php echo validation_errors(); ?>

<h1><?php echo $title ?></h1>

<?php echo form_open('user/sign_in') ?>

<label for="email">email</label>
<input type="text" name="email" id="email" value="<?php echo set_value('email') ?>"/><br>

<label for="password">Password</label>
<input type="password" name="password" id="password" value="<?php echo set_value('password') ?>"/><br>

<input type="submit" name="submit" value="Sign in"/>
<p>If you want to view some sample recipes, meals and menu login with username <em>guest@foodbook.com</em> and password <em>guest</em>.</p>