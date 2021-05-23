<?php
require_once "view/header.php";
include "script/koneksi.php";
?>
<?php
$query = "SELECT * FROM produk ORDER BY idproduk ASC";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
?>
  <div class="grid produk-list main-container">
    <div class="produk-item card flex">
      <table>
        <tr>
          <td><img src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['namaproduk']; ?>" class="img-rounded"></td>
    </div>
    </tr>
    <tr>
      <td>
        <h2><?php echo $row['namaproduk'];
            ?></h2>
      </td>
    </tr>
    <tr>
      <td><?php echo $row['deskripsi'];
          ?></td>
    </tr>
    <tr>
      <td>
        <?php echo rupiah($row['harga']);
        ?></td>
    </tr>
    </table>
    <a href="produk.php?idproduk=<?php echo $row['idproduk']; ?>" class="buy-link link">Lihat Produk</a>
  </div>
  <br>
  </div>
<?php
}
?>
<?php
require_once "view/footer.php";
