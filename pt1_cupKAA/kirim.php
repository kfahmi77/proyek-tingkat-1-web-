<?php
session_start();
if (isset($_POST['submit'])) {
    $subtotal = $_SESSION['cart'][$row['idproduk']]['quantity'] * $row['harga'];
    $totalprice += $subtotal;
    $totalprice += 200000;

    $namaproduk = $_POST['namaproduk'];
    $quantity = $_SESSION['cart'][$row['idproduk']]['quantity'];
    $harga = $_POST['harga'];
    $totalprice = $_POST[$totalprice];

    $nama = $_POST['Nama'];
    $alamat = $_POST['ALamat'];
    $pengiriman = $_POST['pengiriman'];
    $catatan = $_POST['Catatan'];
    $no_wa = $_POST['np_wa'];

    header("location:https//api.whatsapp.com/send?phone=$no_wa&text=namaproduk:%20$namaproduk");
}
