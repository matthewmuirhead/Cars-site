<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Enquiries</h2>

    <table>
      <thead>
        <tr>
          <th style="width: 10%">Name</th>
          <th style="width: 10%">Phone</th>
          <th style="width: 10%">Email</th>
          <th>Enquiry Details</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $enquiry) {
      if ($enquiry['completed'] == 'no') {
        echo '<tr>';
        echo '<td>' . $enquiry['name'] . '</td>';
        echo '<td>' . $enquiry['contact_number'] . '</td>';
        echo '<td>' . $enquiry['contact_email'] . '</td>';
        echo '<td>' . $enquiry['enquiry'] . '</td>';
        echo '<td><form method="post" action="/admin/completeenquiry">
        <input type="hidden" name="id" value="' . $enquiry['id'] . '" />
        <input type="submit" name="submit" value="Mark as Complete" />
        </form></td>';
        echo '</tr>';
      }
    }
    echo '</thead>';
    echo '</table>';
    ?>

    </br></br>

    <h3>Completd Enquiries</h3>

    <table>
      <thead>
        <tr>
          <th style="width: 10%">Name</th>
          <th style="width: 10%">Phone</th>
          <th style="width: 10%">Email</th>
          <th>Enquiry Details</th>
          <th style="width: 10%">Completed By</th>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 5%">&nbsp;</th>
        </tr>
    <?php

    foreach ($templateVars as $enquiry) {
      if ($enquiry['completed'] == 'yes') {
        echo '<tr>';
        echo '<td>' . $enquiry['name'] . '</td>';
        echo '<td>' . $enquiry['contact_number'] . '</td>';
        echo '<td>' . $enquiry['contact_email'] . '</td>';
        echo '<td>' . $enquiry['enquiry'] . '</td>';
        echo '<td>' . $enquiry['staff_name'] . '</td>';
        echo '<td><form method="post" action="/admin/uncompleteenquiry">
        <input type="hidden" name="id" value="' . $enquiry['id'] . '" />
        <input type="submit" name="submit" value="Mark as not Complete" />
        </form></td>';
        echo '<td><form method="post" action="/admin/deleteenquiry">
        <input type="hidden" name="id" value="' . $enquiry['id'] . '" />
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
