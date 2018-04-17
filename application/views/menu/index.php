<h1><?php echo $title ?></h1>
<?php if (!isset($_SESSION['id'])): ?>
    <p><a href="<?php echo(base_url('/user/sign_in/')) ?>">Sign in</a> or <a href="<?php echo(base_url('/user/insert/')) ?>">sign up</a> if you want to save your own menus and recipes!</p>
<?php elseif (empty($menus) && empty($selected_menu)): ?>
    <p>You haven't saved any menus yet. <a href="<?php echo base_url('/menu/insert/') ?>">Create one</a>!</p>
<?php else : ?>
    <p>A menu is a set of meals (breakfast, lunch, dinner) that you eat in one day.</p>
    <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
        <p><a href="<?php echo base_url('/menu/insert/') ?>">Create a new menu</a></p>
    <?php endif; ?>
    <table id="table-menus">
      <thead><tr><th>Name</th><th>Date</th><th colspan="2">Options</th></tr></thead>
      <tbody>
          <?php foreach ($menus as $menu): ?>
            <tr>
              <td><?php echo($menu['menu']) ?></td>
              <td><?php echo($menu['date']) ?></td>
              <td><a href="<?php echo base_url('/menu/view/' . $menu['id']) ?>">View</a></td>
              <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
                  <td><a href="<?php echo base_url('/menu/edit/' . $menu['id']) ?>">Edit</a></td>
              <?php endif; ?>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<?php endif;
