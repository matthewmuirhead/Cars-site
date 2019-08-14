<img src="images/randombanner.php"/>
<main class="home">
  <h1 style="padding-top: 0;">Careers at Claire's Cars</h1>
  <?php
    if ($templateVars[0]['job_id'] == 'no jobs') {
      echo '<h3 style="padding-top: 1em;">'.$templateVars[0]['role'].'</h3>';
    } else {
      foreach ($templateVars as $job) {
        ?>
        <div class="job">
          <h2>Role: <?=$job['role']?></h2>
          <h3>Post Date: <?=$job['post_date']?></h3>
          <h3>Close Date: <?=$job['close_date']?></h3>
          <p>Description: <?=$job['description']?></p>
        </div>
        <?php
      }
    }
  ?>
</main>
