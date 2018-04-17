<h1>Foodbook</h1>
<h2>What is all about?</h2>
<p>This is a web app that allows you to save your recipes and view the related nutrition values and costs.</p>
<p>You can create and save your meals. Each meal is a set of recipes and foods.
  You can create your own recipes and use whatever food you want.</p>
<p>First, you can insert the <a href="<?php echo base_url('/food/'); ?>">foods</a> you want to use in your recipes.<br/>
  Once you have a list of food you can create a <a href="<?php echo base_url('/recipe/'); ?>">recipe</a>.<br/>
  Each recipe and food can be used in your <a href="<?php echo base_url('/meal/'); ?>">meals</a> (breakfast, lunch, dinner).<br/>
  Once you have created your meals you can add to a <a href="<?php echo base_url('/menu/'); ?>">menu</a> of the day!</p>
<!--If user not in session-->
<?php if (!isset($_SESSION['id'])): ?>
    <p><a href="<?php echo(base_url('/user/insert/')) ?>">Sign up</a> if you want to save your own menus and recipes!</p>
    <p><a href="<?php echo(base_url('/user/sign_in/')) ?>">Sign in</a> if you're already a member!</p>
    <?php
 endif;