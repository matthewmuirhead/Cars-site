<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Add Manufacturer</h2>

    <form action="" method="POST">
      <label>Name</label>
      <input type="text" name="manufacturer[name]" required/>


      <input type="submit" name="submit" value="Add Manufacturer" />

    </form>
  </section>
</main>
