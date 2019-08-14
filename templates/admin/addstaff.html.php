<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Add Staff</h2>

    <form action="" method="POST">
      <label>Username:</label><input type="text" name="staff[username]" required/>
      <label>Password:</label><input type="password" name="staff[password]" required/>
      <label>Name:</label><input type="text" name="staff[name]" required/>
      <label>Access Level:</label><select name="staff[access_level]" required>
        <option value="1">1 (Top level)</option>
        <option value="2" selected>2</option>
      </select>

      <input type="submit" name="submit" value="Add Staff" />

    </form>
  </section>
</main>
