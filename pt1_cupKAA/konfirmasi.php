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

<div class="konfirmasi flex">
  <h1 class="title"> Konfirmasi Pembelian </h1>

  <div class="kon-container flex">
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
                <td><?php echo rupiah($row['harga']); ?></td>
          <?php }
          }
        }
          ?>
      </table>
      <br>
      <div class="pengiriman flex">
        <p style="flex:70%;">Pengiriman</p>
        <p style="flex:30%;"><?php $ongkir = 20000;
                              echo rupiah($ongkir) ?></p>
      </div>
      <br>
      <h3>Jumlah :<?php echo rupiah($totalprice += $ongkir);
                  ?></h3><br>
    </div>

    <form action="" class="flex form">
      <input class="input" type="text" name="nama" placeholder="Nama" required>
      <input class="input" type="text" name="alamat" placeholder="Alamat" required>
      <select class="input" name="pengiriman" id="pengiriman" required>
        <option ue="langsung">Ambil Langsung</option>
        <option value="gojek">Gojek</option>
      </select>
      <textarea class="input" type="text" placeholder="Catatan" style="resize: none;"></textarea>
      <!-- ini yang hidden untuk harga total -->
      <input type="text" hidden>
      <input type="button" value="Pesan Kopi" class="link">
    </form>
  </div>



</div>

<?php
require_once "view/footer.php";
?>