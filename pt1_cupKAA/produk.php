<?php
require_once "view/header.php";
?>

<div class="main-container">
    <div class="flex main">
      <div class="product">
        <img src="dist/img/coffee-mugs-1727056_1920.jpg" alt="" class="thumbnail">
      </div>
      <div class="desc card">
        <h2> Nama Produk </h2>
        <h3>Komposisi</h3>
        <ul>
          <li> Jenis </li>
          <li> Rasa </li>
          <li> Unikan </li>
        </ul>
        <h3>Deskripsi</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos molestias voluptates omnis repudiandae illum cum debitis quia, praesentium autem, saepe aliquid alias accusantium repellat. Dicta aut quas architecto voluptatibus distinctio!</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque fugit harum tempore temporibus, autem aut odit architecto deleniti sunt fugiat aperiam totam repellendus dolorum perferendis modi minus adipisci eveniet corrupti!</p>
        <br>
        <h3>Rp. 15.000</h3>
        <div class="buy flex">
          <a href="" class="buy-link link"> <span class="center">Masukan Keranjang</span> </a>
          <a href="" class="buy-link link"> <span class="center">Beli Langsung</span></a>
        </div>
      </div>
    
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
            <td>1</td>
            <td>Rp 15.000</td>
          </tr>
        </table>
        <br>
        <h3>Jumlah : Rp 15.000</h3><br>
        <a href="" class="link"> Konfirmasi Pembelian </a>
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