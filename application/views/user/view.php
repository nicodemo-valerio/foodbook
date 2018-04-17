<h1><?php echo $title ?></h1>
<!--if user is in NOT session display sign in/up page-->
<?php if (!isset($_SESSION['username'])): ?>
    <p><a href="<?php echo(base_url('/user/insert/')) ?>">Sign up</a> if you want to save your own menus and recipes!</p>
    <p>If you're already a member <a href="<?php echo(base_url('/user/sign_in/')) ?>">sign in!</a></p>
<?php else: ?>
    <!--if user is in session display informations-->
    <table>
      <thead><tr><th>Info</th><th>Value</th></tr></thead>
      <tbody>
        <tr><td>Username</td><td><?php echo $_SESSION['username'] ?></td></tr>
        <tr><td>Email</td><td><?php echo $_SESSION['email'] ?></td></tr>
        <tr><td>Password</td><td><?php echo $_SESSION['password'] ?></td></tr>
        <tr><td>Height</td><td><?php echo $_SESSION['height'] ?> cm</td></tr>
        <tr><td>Weight</td><td><?php echo $_SESSION['weight'] ?> kg</td></tr>
        <tr><td>Weight goal</td><td><?php echo $_SESSION['weight_goal'] ?> kg</td></tr>
        <tr><td>BMI</td><td><?php echo $_SESSION['bmi'] ?></td></tr>
      </tbody>
    </table>
    <?php if ($_SESSION['bmi'] > 22): ?>
        <p><?php echo $_SESSION['username'] ?> you're a fat ass! You should weigh less than <?php echo($_SESSION['max_weight']) ?> kg to be in shape.</p>
        <p>But don't worry, by eating <strong><?php echo($_SESSION['max_kcal_male']) ?></strong> kcal/day (if you are a male or <strong><?php echo($_SESSION['max_kcal_female']) ?></strong> kcal/day if you are a female) you should lose about 200 g of fat per day and get your optimal weight in <strong><?php echo $_SESSION['days_to_bmi'] ?> days</strong> on <?php echo date_format($_SESSION['date_of_bmi'],
                "Y-m-d") ?>!</p>
    <?php endif; ?>
    <?php if ($_SESSION['bmi'] <= 22): ?>
        <p>Congratulations <?php echo $_SESSION['username'] ?>, you're in optimal shape!</p>
    <?php endif; ?>
        <?php if ($_SESSION['weight_goal'] > 0): ?>
        <p>With a diet of <strong><?php echo($_SESSION['max_kcal_male']) ?></strong> kcal/day (if you are a male or <strong><?php echo($_SESSION['max_kcal_female']) ?></strong> kcal/day if you are a female) your weight goal of <?php echo $_SESSION['weight_goal'] ?> kg will be reached in about <strong><?php echo $_SESSION['days_to_goal'] ?> days</strong> on <?php
          echo date_format($_SESSION['date_of_goal'], "Y-m-d")
          ?>.</p>
    <?php endif; ?>
    <p><?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?><a href="<?php echo base_url('/user/edit/') ?>">Edit</a> | <?php endif; ?><a href="<?php echo base_url('/user/logout/') ?>">Logout</a></p>
<?php endif;
