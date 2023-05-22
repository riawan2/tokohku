<?php
session_start();
//mendapatkan idproduk dari url
$idproduk = $_GET['id'];
//jika produk ada dikerjanjang maka produk ditambah 1
if (isset($_SESSION['keranjang'][$idproduk])) {
    $_SESSION['keranjang'][$idproduk] += 1;
}
//jika blm maka produk ddianggap beli 1
else {
    $_SESSION['keranjang'][$idproduk] = 1;
}
//echo"<pre>";
//print_r($_SESSION);
//echo"</pre>";
//kehalaman keranjang
echo "<script>alert('produk telah masuk kekeranjang belanja');<?script>";
echo "<script>location='keranjang.php';</script>";
