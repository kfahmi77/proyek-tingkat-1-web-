<?php
require_once "view/header.php";
?>

<div class="flex kontak">

  <h1 class="title"> Kontak Kami </h1>

  <div class="owner">
    <div class="card flex identitas">
      <div class="img">
        <img src="dist/img/coffee-1711431_1920.jpg" alt="">
      </div>

      <div class="desc">
        <?php
        include "script/koneksi.php";
        $data = mysqli_query($conn, "SELECT * FROM kontak");
        while ($row =  mysqli_fetch_array($data)) {
        ?>
          <p><?php echo $row['kontak']; ?></p>
        <?php } ?>

        <span class="icon"></span><a href=""><img src="dist/icon/line-ori.png" alt=""></a>
      </div>
    </div>
  </div>

  <!-- <div class="dev">
    <div class="card"></div>
  </div> -->
</div>

<?php
require_once "view/footer.php";
?>