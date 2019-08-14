<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Add Car</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Car Model</label>
      <input type="text" name="car[name]" required/>

      <label>Description</label>
      <textarea name="car[description]" required></textarea>

      <label>Price</label>
      <input type="text" name="car[price]" required/>

      <label>Engine Type</label>
      <input type="text" name="car[engine_type]" required/>

      <label>Mileage</label>
      <input type="text" name="car[mileage]" required/>

      <input type="hidden" name="car[previous_price]" value="0">

      <label>Category</label>

      <select name="car[manufacturerId]" required>
      <?php
        foreach ($templateVars as $manufacturer) {
          echo '<option value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
        }

      ?>

      </select>

      <label>Image</label>

      <input type="file" name="files[]" multiple="multiple" />

      <input type="submit" name="submit" value="Add Car" />

    </form>
  </section>
</main>
