<h1><?php echo $title ?></h1>
<!-- Display the selected meal -->
<?php if (isset($meal)): ?>
    <?php if (!empty($meal['description'])): ?>
        <h2>Description</h2>
        <p><?php echo $meal['description'] ?></p>
        <p>The quantities are for <?php echo($meal['portions']) ?> people.</p>
    <?php endif; ?>
    <!-- Display the selected recipes -->
    <?php if (!empty($meal_recipes)): ?>
        <h2>Recipes</h2>
        <table>
          <thead><tr><th>Recipe</th><th>Options</th></tr></thead>
          <tbody>
              <?php foreach ($meal_recipes as $recipe): ?>
                <tr>
                  <td><?php echo $recipe['name'] ?></td>
                  <td><a href="<?php echo base_url('/recipe/view/' . $recipe['id']) ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    <?php endif; ?>
    <?php if (!empty($meal_foods)): ?>
        <!-- Display all the selected foods -->
        <h2>Foods</h2>
        <table>
          <thead><tr><th>Food</th><th>Quantity (g)</th></tr></thead>
          <tbody>
              <?php foreach ($meal_foods as $food): ?>
                <tr>
                  <td><?php echo $food['food'] ?></td>
                  <td><?php echo $food['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    <?php endif; ?>
    <!-- Sum the kcal, carb, prot, fat of all the recipes and foods-->
    <h2>Nutrition facts</h2>
    <table>
      <tr><th>Facts</th>
        <th><?php echo $meal['portions'] ?> portions</th>
        <?php if ($meal['portions'] > 1): ?>
            <th>Per portion</th>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Weight</td>
        <td><?php echo round($totals['weight']['final']) ?> g</td>
        <?php if ($meal['portions'] > 1): ?>
            <td><?php echo round($totals['weight']['final_portion']) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Kcal</td>
        <td><?php echo round($totals['kcal']['tot']) ?></td>
        <?php if ($meal['portions'] > 1): ?>
            <td><?php echo round($totals['kcal']['portion']) ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Kcal/100 g</td>
        <td><?php echo round($totals['kcal']['100g']) ?></td>
        <?php if ($meal['portions'] > 1): ?>
            <td><?php echo round($totals['kcal']['100g']) ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Carbohydrates</td>
        <td><?php echo round($totals['carb']['tot'], 2) ?> g (<?php
            echo round($totals['carb']['perc'])
            ?>&#37;)</td>
        <?php if ($meal['portions'] > 1): ?>
            <td><?php echo round($totals['carb']['portion'], 2) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Proteins</td>
        <td><?php echo round($totals['prot']['tot'], 2) ?> g (<?php
            echo round($totals['prot']['perc'])
            ?>&#37;)</td>
        <?php if ($meal['portions'] > 1): ?>
            <td><?php echo round($totals['prot']['portion'], 2) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Fats</td>
        <td>
          <?php echo round($totals['fat']['tot'], 2) ?> g (<?php
          echo round($totals['fat']['perc'])
          ?>&#37;)
        </td>
        <?php if ($meal['portions'] > 1): ?>
            <td><?php echo round($totals['fat']['portion'], 2) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Price</td>
        <td>&euro;<?php echo round($totals['price']['tot'], 2) ?></td>
        <?php if ($meal['portions'] > 1) : ?>
            <td>&euro;<?php echo round($totals['price']['portion'], 2) ?></td>
        <?php endif; ?>
      </tr>
    </table>
    <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
        <p><a href="<?php echo base_url('/meal/edit/' . $meal['id']) ?>">Edit</a></p>
    <?php endif; ?>
    <?php


 endif;
 