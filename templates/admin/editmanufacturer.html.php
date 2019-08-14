<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Edit Manufacturer</h2>

    <form action="" method="POST">

      <input type="hidden" name="manufacturer[id]" value="<?=$templateVars['id']?>" />
      <label>Name</label>
      <input type="text" name="manufacturer[name]" value="<?=$templateVars['name']?>" />

      <input type="submit" name="submit" value="Save Manufacturer" />

    </form>
  </section>
</main>
