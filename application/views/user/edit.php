<?php echo validation_errors(); ?>
<h1><?php echo($title) ?></h1>
<?php
$hidden = array('id' => $_SESSION['id']);
echo form_open('user/edit/' . $_SESSION['id'])
?>
<table>
  <thead><tr><th>Info</th><th>Value</th></tr></thead>
  <tbody>
    <tr><td>Username</td><td><input type="text" name="username" value="<?php echo $user['username'] ?>"/></td></tr>
    <tr><td>Email</td><td><input type="text" name="email" value="<?php echo $user['email'] ?>"/></td></tr>
    <tr><td>Password</td><td><input type="password" name="password" value="<?php echo $user['password'] ?>"/></td></tr>
    <tr><td>Height</td><td><input type="text" name="height" value="<?php echo $user['height'] ?>"/></td></tr>
    <tr><td>Weight</td><td><input type="text" name="weight" value="<?php echo $user['weight'] ?>"/></td></tr>
    <tr><td>Weight goal</td><td><input type="text" name="weight_goal" value="<?php echo $user['weight_goal'] ?>"/></td></tr>
  </tbody>
</table>
<input type="submit" value="Update" name="submit">
</form>
