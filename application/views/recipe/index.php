<h1><?php echo $title ?></h1>
<?php if (!isset($_SESSION['id'])): ?>
    <p><a href="<?php echo(base_url('/user/sign_in/')) ?>">Sign in</a> or <a href="<?php echo(base_url('/user/insert/')) ?>">sign up</a> if you want to save your own menus and recipes!</p
<?php else : ?>
    <?php if (isset($recipes) && !empty($recipes)) : ?>    
        <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
            <p><a href="<?php echo base_url('/recipe/insert/') ?>">Add a new recipe</a></p>
        <?php endif; ?>
        <table>
          <thead><tr><th>Recipe</th><th colspan="2">Options</th></tr></thead>
          <tbody>
              <?php foreach ($recipes as $totals): ?>
                <tr>
                  <td><?php echo $totals['name'] ?></td>
                  <td><a href="<?php echo base_url('/recipe/view/' . $totals['id']) ?>">View</a></td>
                  <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
                      <td><a href="<?php echo base_url('/recipe/edit/' . $totals['id']) ?>">Edit</a></td>
                  <?php endif; ?>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    <?php else : ?>
        <p>You haven't saved any recipe, yet. <a href="<?php echo base_url('/recipe/insert/') ?>">Create one</a>!</p>
    <?php endif; ?>
<?php endif;
