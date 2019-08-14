<img src="images/randombanner.php"/>
<main class="home">
  <p>Welcome to Claire's Cars, Northampton's specialist in classic and import cars.</p>

  <?php
    foreach ($templateVars as $row) {
      echo '<div class="latest-articles"><div class="latest-img-div"><img class="latest-img" src="images/articles/'.$row['id'].'.jpg" alt="'.$row['title'].' image"/></div>';
      echo '<div class="latest-info"><p><strong>'.$row['title'].'</strong></br>';
      $publishDate = strtotime($row['publish_date']);
      echo 'Published '.gmdate('l j F Y', $publishDate).' at '.gmdate('H:i', $publishDate).'</br></br>';
      $first_paragraph = strtok($row['text'], "\n"); //Source: https://stackoverflow.com/questions/2476789/how-to-get-the-first-word-of-a-sentence-in-php/2477411#2477411
      echo substr($first_paragraph, 0, 200).'</p></div></div>';
    }
  ?>
</main>
