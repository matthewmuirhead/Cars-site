<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Cars</h2>

    <a class="new" href="/admin/addcar">Add new car</a>

    <table>
      <thead>
        <tr>
          <th>Model</th>
          <th style="width: 10%">Price</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $car) {
      if ($car['archive'] == 'no') {
        echo '<tr>';
        echo '<td>' . $car['make'] . ' ' . $car['model'] . '</td>';
        echo '<td>£' . $car['price'] . '</td>';
        echo '<td><a style="float: right" href="/admin/editcar?id=' . $car['id'] . '">Edit</a></td>';
        echo '<td><form method="post" action="/admin/archivecar">
        <input type="hidden" name="id" value="' . $car['id'] . '" />
        <input type="submit" name="submit" value="Archive" />
        </form></td>';
        echo '<td><form method="post" action="/admin/deletecar">
        <input type="hidden" name="id" value="' . $car['id'] . '" />
        <input type="submit" name="submit" value="Delete" />
        </form></td>';
        echo '</tr>';
      }
    }
    echo '</thead>';
    echo '</table>';
    ?>

    </br></br>

    <h3>Archived Cars</h3>

    <table>
      <thead>
        <tr>
          <th>Model</th>
          <th style="width: 10%">Price</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $car) {
      if ($car['archive'] == 'yes') {
        echo '<tr>';
        echo '<td>' . $car['make'] . ' ' . $car['model'] . '</td>';
        echo '<td>£' . $car['price'] . '</td>';
        echo '<td><a style="float: right" href="/admin/editcar?id=' . $car['id'] . '">Edit</a></td>';
        echo '<td><form method="post" action="/admin/relistcar">
        <input type="hidden" name="id" value="' . $car['id'] . '" />
        <input type="submit" name="submit" value="Relist Car" />
        </form></td>';
        echo '<td><form method="post" action="/admin/deletecar">
        <input type="hidden" name="id" value="' . $car['id'] . '" />
        <input type="submit" name="submit" value="Delete" />
        </form></td>';
        echo '</tr>';
      }
    }
    echo '</thead>';
    echo '</table>';
    ?>
  </section>
</main>
