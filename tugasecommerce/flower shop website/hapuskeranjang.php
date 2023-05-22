<?php 
session_start();
$idproduk=$_GET["id"];
unset($_SESSION["keranjang"][$idproduk]);
echo"<script>alert('produk telah dihapus');<script>";
echo"<script>location='keranjang.php';<script>";
