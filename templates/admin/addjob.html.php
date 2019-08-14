<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Add Job</h2>

    <form action="" method="POST">
      <label>Role:</label><input type="text" name="job[role]" required/>
      <label>Description:</label><textarea name="job[description]" required></textarea>
      <label>Post Date:</label><input type="date" name="job[post_date]" value=<?=date("Y-m-d")?> required/>
      <label>Close Date:</label><input type="date" name="job[close_date]" value=<?=date('Y-m-d', time() + (14 * 24 * 60 * 60))?> required/>
      <input type="submit" name="submit" value="Add Job" />

    </form>
  </section>
</main>
