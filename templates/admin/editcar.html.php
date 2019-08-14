<main class="admin">
  <?php
    require 'menu.html.php';
  ?>
  <section class="right">
    <h2>Edit Car</h2>

    <form action="" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="car[id]" value="<?=$templateVars[0][0]['id'];?>" />
      <label>Model</label>
      <input type="text" name="car[name]" value="<?=$templateVars[0][0]['model'];?>" />

      <label>Description</label>
      <textarea name="car[description]"><?=$templateVars[0][0]['description'];?></textarea>

      <label>Price</label>
      <input type="text" name="car[price]" value="<?=$templateVars[0][0]['price'];?>" />

      <label>Engine Type</label>
      <input type="text" name="car[engine_type]" value="<?=$templateVars[0][0]['engine_type']?>" />

      <label>Mileage</label>
      <input type="text" name="car[mileage]" value="<?=$templateVars[0][0]['mileage']?>" />

      <input type="hidden" name="car[previous_price]" value="<?=$templateVars[0][0]['price']?>">

      <label>Category</label>

      <select name="car[manufacturerId]">
      <?php
        foreach ($templateVars[1] as $manufacturer) {
          if ($templateVars[0][0]['manufacturerId'] == $manufacturer['id']) {
            echo '<option selected="selected" value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
          }
          else {
            echo '<option value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
          }

        }

      ?>

      </select>

      <label>Product image</label>

      <input type="file" name="files[]" multiple="multiple" />

      <input type="submit" name="submit" value="Save Product" />

    </form>
  </section>
</main>
