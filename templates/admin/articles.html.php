<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Articles</h2>

    <a class="new" href="/admin/addarticle">Add new article</a>

    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $article) {
      echo '<tr>';
      echo '<td>' . $article['title'] . '</td>';
      echo '<td><a style="float: right" href="/admin/editarticle?id=' . $article['id'] . '">Edit</a></td>';
      echo '<td><form method="post" action="/admin/deletearticle">
      <input type="hidden" name="id" value="' . $article['id'] . '" />
      <input type="submit" name="submit" value="Delete" />
      </form></td>';
      echo '</tr>';
    }
    echo '</thead>';
    echo '</table>';
    ?>
  </section>
</main>
