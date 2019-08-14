<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Staff</h2>

    <a class="new" href="/admin/addstaff">Add new staff member</a>


    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th style="width: 40%">Username</th>
          <th style="width: 10%">Access Level</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $staff) {
        echo '<tr>';
        echo '<td>' . $staff['name'] . '</td>';
        echo '<td>' . $staff['username'] . '</td>';
        echo '<td>' . $staff['access_level'] . '</td>';
        echo '<td><a style="float: right" href="/admin/editstaff?id=' . $staff['id'] . '">Edit</a></td>';
        if ($staff['id'] != 0) {
          echo '<td><form method="post" action="/admin/deletestaff">
          <input type="hidden" name="id" value="' . $staff['id'] . '" />
          <input type="submit" name="submit" value="Delete" />
          </form></td>';
        } else {
          echo '<td></td>';
        }
        echo '</tr>';
    }

    echo '</thead>';
    echo '</table>';
    ?>
  </section>
</main>
