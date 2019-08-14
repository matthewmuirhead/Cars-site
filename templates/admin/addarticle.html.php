<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Add Article</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Title: </label>
      <input type="text" name="article[title]" required/>

      <label>Article Text: </label>
      <textarea name="article[text]" required></textarea>

      <input type="hidden" name="article[publish_date]" value="<?=date('Y-m-d')?>">
      <input type="hidden" name="article[publish_date]" value="<?=$_SESSION['id']?>">

      <label>Image: </label>

      <input type="file" name="image" />

      <input type="submit" name="submit" value="Add Article" />

    </form>
  </section>
</main>
