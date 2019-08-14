<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Edit Staff</h2>

    <form action="" method="POST">
      <input type="hidden" name="staff[id]" value="<?=$templateVars['id']?>">
      <label>Username:</label><input type="text" name="staff[username]" value="<?=$templateVars['username']?>"/>
      <label>Password:</label><input type="password" name="staff[password]" value="" required/>
      <label>Name:</label><input type="text" name="staff[name]" value="<?=$templateVars['name']?>"/>
      <label>Access Level:</label><select name="staff[access_level]">
        <?php
          if ($templateVars['id'] == 0) {
            ?><option value="1" <?php if ($templateVars['access_level'] == 1) echo 'selected' ?> >1 (Top level)</option><?php
          } else {
            ?><option value="1" <?php if ($templateVars['access_level'] == 1) echo 'selected' ?> >1 (Top level)</option>
            <option value="2" <?php if ($templateVars['access_level'] == 2) echo 'selected' ?> >2</option><?php
          }
        ?>
      </select>
      <input type="submit" name="submit" value="Edit Staff" />
    </form>
  </section>
</main>
