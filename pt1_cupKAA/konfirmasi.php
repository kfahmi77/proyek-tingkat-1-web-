<?php
require_once "view/header.php";
include "script/koneksi.php";
session_start();
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
          <?php
              if (isset($_POST['submit'])) {
                $nohape = 62895345860230;
                $text = "Halo kak saya ingin memesan produk:";
                $nproduk = $row['namaproduk'];
                $jml = $_SESSION['cart'][$row['idproduk']]['quantity'];
                $ongkir = 20000;
                $total = rupiah($totalprice += $ongkir);
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $pengiriman = $_POST['pengiriman'];
                $catatan = $_POST['catatan'];

                echo "<script>window.location = 'https://api.whatsapp.com/send?phone=$nohape&text=$text%0A%0ANama Produk :$nproduk%0AJumlah :$jml%0ATotal : $total%0ANama Pembeli:$nama%0AAlamat : $alamat%0APengiriman : $pengiriman%0ACatatan : $catatan'</script>";
              }
            }
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

    <form action="" class="flex form" method="post">
      <input class="input" type="text" name="nama" placeholder="nama" required>
      <input class="input" type="text" name="alamat" placeholder="alamat" required>
      <select class="input" name="pengiriman" id="pengiriman" required>
        <option value="langsung">Ambil Langsung</option>
        <option value="gojek">Gojek</option>
      </select>
      <textarea class="input" type="text" placeholder="catatan" style="resize: none;" name="catatan"></textarea>
      <!-- ini yang hidden untuk harga total -->
      <input type=" text" hidden name="no_wa" value="62895345860230">
      <input type="submit" value="Pesan Kopi" class="link" name="submit">
    </form>
  </div>

</div>
<?php
?>
<?php
require_once "view/footer.php";
?>