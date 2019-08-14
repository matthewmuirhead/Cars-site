<img src="images/randombanner.php"/>
<main class="admin">

<section class="left">
  <ul>
    <?php
      foreach ($templateVars[1] as $manufacturer) {
        echo '<li><a href="manufacturers?id='.$manufacturer['id'].'">'.$manufacturer['name'].'</a></li>';
      }
    ?>
  </ul>
</section>

<section class="right">

  <h1><?=$templateVars[2]?></h1>

<ul class="cars">


<?php

foreach ($templateVars[0] as $car) {
  if ($car['archive'] == 'no') {
    echo '<li>';

    for ($i=0; $i<$car['number_of_images']; $i++) {
      if (file_exists('images/cars/' . $car['id'] . '[' . $i . '].jpg')) {
        echo '<a href="images/cars/' . $car['id'] . '[' . $i . '].jpg"><img src="images/cars/' . $car['id'] . '[' . $i . '].jpg" /></a>';
      }
    }


    echo '<div class="details">';
    echo '<h2>' . $car['make'] . ' ' . $car['model'] . '</h2>';
    echo '<h3>Price: £' . $car['price'] . '</h3>';;
    if ($car['previous_price'] > $car['price']) {
      echo '<h4>Previous price: £'.$car['previous_price'].'</h4>';
    }
    echo '<h4>Mileage: '.$car['mileage'].' Engine Type: '.$car['engine_type'].'</h4>';
    echo '<p>' . $car['description'] . '</p>';

    echo '</div>';
    echo '</li>';
  }
}

?>

</ul>

</section>
</main>
