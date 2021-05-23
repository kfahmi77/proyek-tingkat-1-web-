<?php
require_once "view/header.php";
include "script/koneksi.php";
session_start();
if (isset($_GET['action']) && $_GET['action'] == "add") {
  $id = intval($_GET['idproduk']);
  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
  } else {
    $sql_p = "SELECT * FROM produk WHERE idproduk='$id'";
    $query_p = mysqli_query($conn, $sql_p);
    if (mysqli_num_rows($query_p) != 0) {
      $row_p = mysqli_fetch_array($query_p);
      $_SESSION['cart'][$row_p['idproduk']] = array("quantity" => 1, "harga" => $row_p['harga']);
    } else {
      $message = "Product ID is invalid";
    }
  }
}
if (isset($_GET['action']) && $_GET['action'] == "remove") {
  if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $k => $v) {
      if ($_GET["idproduk"] == $k)
        unset($_SESSION["cart"][$k]);
      if (empty($_SESSION["cart"]))
        unset($_SESSION["cart"]);
    }
  }
}
?>
<?php
$id = $_GET['idproduk'];
$ambildata = mysqli_query($conn, "SELECT * FROM produk, jenis_produk where produk.idproduk=jenis_produk.idjenis AND idproduk='$id'");
while ($row = mysqli_fetch_array($ambildata)) {
?>
  ?>
  <div class="main-container">
    <div class="flex main">
      <div class="product">
        <img src="img/<?php echo $row['gambar']; ?>" alt="" class="thumbnail">
      </div>
      <div class="desc card">
        <h2><?php echo $row['namaproduk']; ?> </h2>
        <h3>Komposisi</h3>
        <ul>
          <li><?php echo $row['namajenis']; ?> </li>
          <li> Rasa </li>
          <li> Unikan </li>
        </ul>
        <h3>Deskripsi</h3>
        <p><?php echo $row['deskripsi']; ?></p>
        <h3><?php echo $row['harga']; ?></h3>
        <div class="buy flex">
          <a href="produk.php?page=produk&action=add&idproduk=<?php echo $row['idproduk']; ?>" class="buy-link link"> <span class="center">Masukan Keranjang</span> </a>
          <a href="" class="buy-link link"> <span class="center">Beli Langsung</span></a>
        </div>
      </div>
    <?php }
    ?>

    <div class="cart card flex">
      <h2>Keranjang</h2>
      <table>
        <tr class="table">
          <th>No</th>
          <th>Produk</th>
          <th>Jumlah</th>
          <th>Harga</th>
        </tr>
        <?php
        $no = 1;
        $totalprice = 0;
        if (isset($_SESSION['cart'])) {
          $sql = "SELECT * FROM produk WHERE idproduk IN(";
          foreach ($_SESSION['cart'] as $id => $value) {
            $sql .= $id . ",";
          }
          $sql = substr($sql, 0, -1) . ") ORDER BY idproduk ASC";
          $query = mysqli_query($conn, $sql);
          if (!empty($query)) {
            while ($row = mysqli_fetch_array($query)) {
        ?>
              <tr class="table">
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['namaproduk']; ?></td>
                <td><?php echo $_SESSION['cart'][$row['idproduk']]['quantity']; ?></td>
                <?php
                $subtotal = $_SESSION['cart'][$row['idproduk']]['quantity'] * $row['harga'];
                $totalprice += $subtotal;
                ?>
                <td><?php echo $row['harga']; ?></td>
                <td><a href="produk.php?page=produk&action=remove&idproduk=<?php echo $row['idproduk']; ?>">hapus</a></td>
              <?php
            }
          } else {
              ?>

              <tr>
                <td colspan="3"><?php echo "<i>Your cart is empty."; ?></td>
              </tr>
            <?php
          }
            ?>


            <tr>
              <td colspan="3"><a href="index.php?page=cart">Go To Cart</a></td>
            </tr>
          <?php
        } else {
          ?>
            <tr>
              <td><?php echo "Your Cart is Empty"; ?></td>
            </tr>
          <?php
        }
          ?>
          </tr>
      </table>
      <br>
      <h3>Jumlah : Rp <?php echo $totalprice; ?></h3><br>
      <a href="konfirmasi.php" class="link"> Konfirmasi Pembelian </a>
    </div>

    </div>

    <div class="review">
      <h1>Review</h1>

      <div class="flex review-container">
        <div class="card">
          <h2>Review 1</h2>
          <p>tanggal</p><br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, atque architecto. Est illo officia porro, hic cumque sit. Illum, inventore nam totam mollitia iusto reprehenderit voluptates. Numquam ipsam sint perferendis.</p>
        </div>
        <div class="card">
          <h2>Review 1</h2>
          <p>tanggal</p><br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, atque architecto. Est illo officia porro, hic cumque sit. Illum, inventore nam totam mollitia iusto reprehenderit voluptates. Numquam ipsam sint perferendis.</p>
        </div>
        <div class="card">
          <h2>Review 1</h2>
          <p>tanggal</p><br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, atque architecto. Est illo officia porro, hic cumque sit. Illum, inventore nam totam mollitia iusto reprehenderit voluptates. Numquam ipsam sint perferendis.</p>
        </div>
        <a href="" class="link"> Tambah Review </a>
      </div>


    </div>
  </div>


  <?php
  require_once "view/footer.php";
  ?>