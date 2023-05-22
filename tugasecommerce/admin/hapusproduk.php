<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE idproduk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['fotoo'];
if (file_exists("../fotoo/$foto")) {
    unlink("../fotoo/$foto");
}
$koneksi->query("DELETE FROM produk WHERE idproduk='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
