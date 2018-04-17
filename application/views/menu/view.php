<h1><?php echo $title ?></h1>
<?php if (!empty($selected_menu)): ?>
    <?php if (!empty($selected_menu[0]['description'])): ?>
        <p>Description: <?php echo($selected_menu[0]['description']) ?></p>
    <?php endif; ?>
    <p>Date: <?php echo($selected_menu[0]['date']) ?></p>
    <h2>Meals</h2>
    <table>
      <thead><tr><th>Meal</th><th>Options</th></tr></thead>
      <tbody>
          <?php foreach ($selected_menu as $meal): ?>
            <tr>
              <td><?php echo($meal['name']) ?></td>
              <td><a href="<?php echo(base_url('/meal/view/' . $meal['meal_id'])) ?>">View</a></td>
            </tr>
        <?php endforeach; ?>   
      </tbody>
    </table>
    <h2>Nutrition facts</h2>
    <table>
      <thead><tr><th>Fact</th><th>Totals</th><th>Per portion</th></tr></thead>
      <tbody>
        <tr>
          <td>Weight</td>
          <td><?php echo round($totals['weight']['final']) ?> g</td>
          <td><?php echo round($totals['weight']['final_portion']) ?> g</td>
        </tr>

        <tr>
          <td>Kcal</td>
          <td><?php echo round($totals['kcal']['tot']) ?></td>
          <td><?php echo round($totals['kcal']['portion']) ?></td>
        </tr>
        <tr>
          <td>Kcal/100 g</td>
          <td><?php echo round($totals['kcal']['100g']) ?></td>
          <td><?php echo round($totals['kcal']['100g']) ?></td>
        </tr>
        <tr>
          <td>Carbohydrates</td>
          <td><?php echo round($totals['carb']['tot'], 2) ?> g (<?php echo round($totals['carb']['perc']) ?>&#37;)</td>
          <td><?php echo round($totals['carb']['portion'], 2) ?> g</td>
        </tr>
        <tr>
          <td>Proteins</td>
          <td><?php echo round($totals['prot']['tot'], 2) ?> g (<?php echo round($totals['prot']['perc']) ?>&#37;)</td>
          <td><?php echo round($totals['prot']['portion'], 2) ?> g</td>
        </tr>
        <tr>
          <td>Fats</td>
          <td><?php echo round($totals['fat']['tot'], 2) ?> g (<?php echo round($totals['fat']['perc']) ?>&#37;)</td>
          <td><?php echo round($totals['fat']['portion'], 2) ?> g</td>
        </tr>
        <tr>
          <td>Price</td>
          <td>&euro;<?php echo round($totals['price']['tot'], 2) ?></td>
          <td>&euro;<?php echo round($totals['price']['portion'], 2) ?></td>
        </tr>
      </tbody>
    </table>
    <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
        <p><a href="<?php echo base_url('/menu/edit/' . $selected_menu[0]['id']) ?>">Edit</a></p>
    <?php endif; ?>
<?php endif; ?>