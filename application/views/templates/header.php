<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>"/>
    <meta charset="UTF-8">
    <title>Foodbook - <?php echo $title ?></title>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="<?php echo base_url('pages/view/home'); ?>">Home</a></li>     
        <li><a href="<?php echo base_url('food/'); ?>">Foods</a></li>
        <?php if (isset($_SESSION['id'])) : ?>
            <li><a href="<?php echo base_url('recipe/'); ?>">Recipes</a></li>            
            <li><a href="<?php echo base_url('meal/'); ?>">Meals</a></li>
            <li><a href="<?php echo base_url('menu/'); ?>">Menus</a></li>       
            <li><a href="<?php echo base_url('user/'); ?>">Profile</a></li>
        <?php endif; ?>
      </ul>
    </nav>
    <main>