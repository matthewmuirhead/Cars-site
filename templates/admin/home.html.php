<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Welcome <?=$_SESSION['user']?></h2>
    <p>You are now logged in</p>
    <a href="/admin/logout"><button type="button" name="button">Logout</button></a>
  </section>
</main>
