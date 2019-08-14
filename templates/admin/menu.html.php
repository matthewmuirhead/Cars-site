<section class="left">
  <ul>
    <li><a href="/admin/home">Admin Home</a></li>
    <?php
      if ($_SESSION['access'] == 1) {
        echo '<li><a href="/admin/staff">Staff</a></li>';
      }
    ?>
    <li><a href="/admin/cars">Cars</a></li>
    <li><a href="/admin/manufacturers">Manufacturers</a></li>
    <li><a href="/admin/jobs">Jobs</a></li>
    <li><a href="/admin/enquiries">Enquiries</a></li>
    <li><a href="/admin/articles">News Articles</a></li>
  </ul>
</section>
