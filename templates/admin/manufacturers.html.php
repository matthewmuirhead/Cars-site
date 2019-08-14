<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Manufacturers</h2>

    <a class="new" href="/admin/addmanufacturer">Add new manufacturer</a>


    <table>
    <thead>
    <tr>
    <th>Name</th>
    <th style="width: 5%">&nbsp;</th>
    <th style="width: 5%">&nbsp;</th>
    </tr>

<?php
    foreach ($templateVars as $manufacturer) {
      echo '<tr>';
      echo '<td>' . $manufacturer['name'] . '</td>';
      echo '<td><a style="float: right" href="/admin/editmanufacturer?id=' . $manufacturer['id'] . '">Edit</a></td>';
      echo '<td><form method="post" action="/admin/deletemanufacturer">
      <input type="hidden" name="id" value="' . $manufacturer['id'] . '" />
      <input type="submit" name="submit" value="Delete" />
      </form></td>';
      echo '</tr>';
    }
    ?>

    </thead>
    </table>
  </section>
</main>
