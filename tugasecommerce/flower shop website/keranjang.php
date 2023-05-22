<?php
session_start();

echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";
$koneksi = new mysqli("localhost", "root", "", "tokoh");
if (empty($_SESSION['keranjang']) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('keranjang kosong silahkan beli dulu');</script>";
    echo "<script>location='index.php';</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejproduct</title>
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header section starts  -->
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">ejproduk<span>.</span></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>


        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="keranjang.php" class="fas fa-shopping-cart"></a>
            <!--jika sudah login ada session pelanggan)-->
            <?php if (isset($_SESSION["pelanggan"])) : ?>
                <li><a href="logout.php" class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Logout</a></li>
                <!--blm login blm ada session pelanggan-->
            <?php else : ?>
                <li><a href="login.php" class="fas fa-user">Login</a></li>

            <?php endif ?>
        </div>


    </header>
    <section class="keranjang" id="keranjang">
        <h1 class="heading"> keranjang </h1>
        <table class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) : ?>
                        <!--menampikan produk-->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM produk 
                    WHERE idproduk='$idproduk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga"] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td> <img src="../fotoo/<?php echo $pecah['foto']; ?>" width="50">
                            </td>
                            <td><?php echo $pecah["nama"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $idproduk ?>" class="btn btn-danger btn-xs">hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-default">Lanjutkn belanja </a>
            <a href="bayar.php" class="btn btn-primary"> Bayar</a>
    </section>
</body>

</html>




















</body>

</html>