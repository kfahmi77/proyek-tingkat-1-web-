<?php
require_once "view/header.php";
?>

<div class="tentang flex">
  <h1 class="title"> Tentang Kopi Abah Ambu </h1>
  <div class="grid">
    <div class="desc">
      <h2> Kopi Abah Ambu </h2>
      <?php
      include "script/koneksi.php";
      $data = mysqli_query($conn, "SELECT * FROM tentang");
      while ($row =  mysqli_fetch_array($data)) {
      ?>
        <p><?php echo $row['tentang']; ?></p>
      <?php } ?>
    </div>

    <div class="img">
      <img src="dist/img/coffee-1711431_1920.jpg" alt="">
    </div>
  </div>
</div>

<?php
require_once "view/footer.php";
?>