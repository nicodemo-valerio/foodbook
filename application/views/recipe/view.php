<?php if (isset($totals)): ?>
    <h1><?php echo $title ?></h1>
    <h2>Ingredients</h2>
    <ol>
        <?php foreach ($totals['ingredients'] as $ingredient): ?>
          <li><?php echo $ingredient['food'] ?>: <?php echo $ingredient['quantity'] ?>g</li>
      <?php endforeach; ?>
    </ol>
    <?php if (!empty($totals['instructions'])): ?>
        <h2>Instructions</h2>
        <p><?php echo $totals['instructions'] ?></p>
    <?php endif; ?>
    <h2>Nutrition facts (<?php echo round($totals['portions'], 2) ?> portions)</h2>
    <table>
      <tr>
        <th>Fact<th>Totals</th>
        <?php if ($totals['portions'] > 1) : ?>
            <th>Per portion</th>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Weight of ingredients</td>
        <td><?php echo round($totals['weight']['tot']) ?> g</td>
        <?php if ($totals['portions'] > 1) : ?>
            <td><?php echo round($totals['weight']['portion']) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Final weight</td>
        <td><?php echo round($totals['weight']['final']) ?> g</td>
        <?php if ($totals['portions'] > 1) : ?>
            <td><?php echo round($totals['weight']['final_portion']) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>kcal</td>
        <td><?php echo round($totals['kcal']['tot']) ?></td>
        <?php if ($totals['portions'] > 1) : ?>
            <td>
                <?php
                echo round($totals['kcal']['portion'])
                ?>
            </td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>kcal/100 g</td>
        <td><?php echo round($totals['kcal']['100g']) ?></td>
        <?php if ($totals['portions'] > 1) : ?>
            <td><?php echo round($totals['kcal']['100g']) ?></td>
        <?php endif; ?>       
      </tr>
      <tr>
        <td>Carbohydrates</td>
        <td><?php echo round($totals['carb']['tot'], 2) ?> g (<?php echo round($totals['carb']['perc']) ?>&#37;)</td>
        <?php if ($totals['portions'] > 1) : ?>
            <td><?php echo round($totals['carb']['portion'], 2) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Proteins</td><td><?php echo round($totals['prot']['tot'], 2) ?> g (<?php echo round($totals['prot']['perc']) ?>&#37;)</td>
        <?php if ($totals['portions'] > 1) : ?>
            <td><?php echo round($totals['prot']['portion'], 2) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Fats</td>
        <td><?php echo round($totals['fat']['tot'], 2) ?> g (<?php echo round($totals['fat']['perc']) ?>&#37;)</td>
        <?php if ($totals['portions'] > 1) : ?>
            <td><?php echo round($totals['fat']['portion'], 2) ?> g</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td>Price</td>
        <td>&euro;<?php echo round($totals['price']['tot'], 2) ?></td>
        <?php if ($totals['portions'] > 1) : ?>
            <td>&euro;<?php echo round($totals['price']['portion'], 2) ?></td>
        <?php endif; ?>
      </tr>
    </table>
    <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
        <p><a href="<?php echo base_url('/recipe/edit/' . $totals['id']) ?>">Edit</a></p>
    <?php endif; ?>
<?php else : ?>
    <p>No recipe to display.</p>
<?php endif; 
