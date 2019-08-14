<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Jobs</h2>

    <a class="new" href="/admin/addjob">Add new job</a>


    <table>
      <thead>
        <tr>
          <th>Role</th>
          <th style="width: 10%">Post Date</th>
          <th style="width: 10%">Close Date</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $job) {
        echo '<tr>';
        echo '<td>' . $job['role'] . '</td>';
        echo '<td>' . $job['post_date'] . '</td>';
        echo '<td>' . $job['close_date'] . '</td>';
        echo '<td><a style="float: right" href="/admin/editjob?id=' . $job['job_id'] . '">Edit</a></td>';
        echo '<td><form method="post" action="/admin/deletejob">
        <input type="hidden" name="id" value="' . $job['job_id'] . '" />
        <input type="submit" name="submit" value="Delete" />
        </form></td>';
        echo '</tr>';
    }

    echo '</thead>';
    echo '</table>';
    ?>
  </section>
</main>
