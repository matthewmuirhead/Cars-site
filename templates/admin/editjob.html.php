<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Add Job</h2>

    <form action="" method="POST">
      <input type="hidden" name="job[job_id]" value=<?=$_GET['id']?> />
      <label>Role:</label><input type="text" name="job[role]" value=<?=$templateVars['role']?> />
      <label>Description:</label><textarea name="job[description]"><?=$templateVars['description']?></textarea>
      <label>Post Date:</label><input type="date" name="job[post_date]" value=<?=$templateVars['post_date']?> />
      <label>Close Date:</label><input type="date" name="job[close_date]" value=<?=$templateVars['close_date']?> />
      <input type="submit" name="submit" value="Update Job" />

    </form>
  </section>
</main>
