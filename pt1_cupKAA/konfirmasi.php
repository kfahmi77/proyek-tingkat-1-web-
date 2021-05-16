<?php
require_once "view/header.php";
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
        <tr class="table">
          <td>1.</td>
          <td>Kopi es teh anget</td>
          <td class="center">1</td>
          <td>Rp 15.000</td>
        </tr>
        <tr class="table">
          <td>1.</td>
          <td>Kopi es teh anget</td>
          <td class="center">1</td>
          <td>Rp 15.000</td>
        </tr>
      </table>
      <br>
      <div class="pengiriman flex">
        <p style="flex:70%;">Pengiriman</p>
        <p style="flex:30%;">Rp. 150.000</p>
      </div>
      <br>
      <h3>Jumlah : Rp 155.000</h3><br>
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
      <input type="button" value="Pesan Kopi" class="link" >
    </form>
  </div>

  

</div>

<?php
require_once "view/footer.php";
?>