<?php
require_once "view/header.php";
include "script/koneksi.php";
?>

<div class="grid produk-list main-container">
  <div class="produk-item card flex">
    <?php
    $query = "SELECT * FROM produk ORDER BY idproduk ASC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <img src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['namaproduk']; ?>">
      <h2><?php echo $row['namaproduk']; ?></h2>
      <p><?php echo $row['deskripsi']; ?></p>
      <p><?php echo $row['harga']; ?></p>
      <a href="produk.php?idproduk=<?php echo $row['idproduk']; ?>" class="link">Lihat Produk</a>
    <?php
    }
    ?>
  </div>
  <br>
</div>

<?php
require_once "view/footer.php";
?>