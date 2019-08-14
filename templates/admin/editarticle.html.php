<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Edit Article</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="article[id]" value="<?=$_GET['id']?>">

      <label>Title: </label>
      <input type="text" name="article[title]" value="<?=$templateVars['title']?>"/>

      <label>Article Text: </label>
      <textarea name="article[text]"><?=$templateVars['text']?></textarea>

      <label>Image: </label>

      <input type="file" name="image" />

      <input type="submit" name="submit" value="Edit Article" />

    </form>
  </section>
</main>
