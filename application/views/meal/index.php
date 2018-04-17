<h1><?php echo $title ?></h1>
<?php if (!isset($_SESSION['id'])): ?>
    <p><a href="<?php echo(base_url('/user/sign_in/')) ?>">Sign in</a> or <a href="<?php echo(base_url('/user/insert/')) ?>">sign up</a> if you want to save your own menus and recipes!</p>
<?php else : ?>
    <!-- In case no parameters are passed the list of all the meals is showed -->
    <p>A meal is intended as a set of recipes and/or foods that you consume in one setting.
      A meal can be breakfast, brunch, lunch, dinner and also the snacks you eat
      during a break at work!</p>
    <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
        <p><a href="<?php echo base_url('/meal/insert/') ?>">Create a new meal</a></p>
    <?php endif; ?>
    <?php if (!empty($meals)) : ?>
        <table>
          <thead><tr><th>Meal</th><th colspan="2">Options</th></tr></thead>
          <tbody>
              <?php foreach ($meals as $meal_item) : ?>
                <tr>
                  <td><?php echo $meal_item['name'] ?></td>
                  <td><a href="<?php echo base_url('index.php/meal/view/' . $meal_item['id']) ?>">View</a></td>
                  <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
                      <td><a href="<?php echo base_url('index.php/meal/edit/' . $meal_item['id']) ?>">Edit</a></td>
                  <?php endif; ?>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    <?php endif; ?>
<?php endif;
