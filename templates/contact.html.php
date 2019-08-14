<img src="images/randombanner.php"/>
<main class="home">
  <?php
    if (isset($templateVars['submit'])) {
      echo '<h4>Enquiry successfully submitted, we endevour to get back to you as quick as we can</h4></br>';
    }
  ?>
  <h2>Have a question? Get in touch below</h2>
  <form action="" method="post">
    <label>Name:</label><input type="text" name="enquiry[name]" value="">
    <label>Phone Number:</label><input type="text" name="enquiry[contact_number]" value="">
    <label>Email:</label><input type="text" name="enquiry[contact_email]" value="">
    <label>Enquiry:</label><textarea name="enquiry[enquiry]"></textarea>
    <input type="hidden" name="enquiry[completed]" value="no">
    <input type="submit" name="submit" value="Submit">
  </form>
</main>
