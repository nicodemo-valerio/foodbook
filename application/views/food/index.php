<h1><?php echo $title ?></h1>
<p>Nutrition facts are for 100 g of product.</p>
<?php if (isset($_SESSION['id']) && $_SESSION['username'] !== 'Guest'): ?>
    <p><a href="<?php echo base_url('/food/insert/') ?>">Add a new food/ingredient</a></p>
<?php endif; ?>
<table>
  <thead><tr><th>Food</th><th>Kcal</th><th>Carb</th><th>Prot</th><th>Fat</th><th>Price</th><?php if (isset($_SESSION['id']) && $_SESSION['username'] !== 'Guest'): ?><th>&nbsp;</th><?php endif; ?></tr></thead>
  <?php $i = 0; ?>
  <tbody>
      <?php foreach ($food as $food_item): ?>
        <tr>
          <td><?php echo $food_item['food'] ?></td>
          <td><?php echo round($totals[$i]) ?></td>
          <td><?php echo $food_item['carb'] ?></td>
          <td><?php echo $food_item['prot'] ?></td>
          <td><?php echo $food_item['fat'] ?></td>
          <td><?php echo round($food_item['price'], 2) ?></td>
          <?php if (isset($_SESSION['id']) && $_SESSION['username'] != 'Guest'): ?>
              <td><a href="<?php echo base_url('/food/edit/' . $food_item['id']) ?>">edit</a></td>
          <?php endif; ?>
        </tr>
        <?php $i++; ?>
      </tbody>
  <?php endforeach ?>
</table>