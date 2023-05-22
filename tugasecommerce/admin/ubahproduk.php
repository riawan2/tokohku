<h2>Ubah Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE idproduk='{$_GET['id']}'");
$pecah = $ambil->fetch_assoc();
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
    </div>
    <div class="form-group">
        <input type="text" name="harga" class="form-control" value="<?php echo $pecah['harga']; ?>">
    </div>
    <div class="form-group">
        <input type="text" name="berat" class="form-control" value="<?php echo $pecah['berat']; ?>">
    </div>
    <div class="form-group">
        <img src="../fotoo/<?php echo $pecah['foto'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi']; ?></textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    // Jika foto diubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../fotoo/$namafoto");
        $koneksi->query("UPDATE produk SET nama='{$_POST['nama']}', harga='{$_POST['harga']}', berat='{$_POST['berat']}', 
        foto='$namafoto', deskripsi='{$_POST['deskripsi']}' WHERE idproduk='{$_GET['id']}'");
    } else { // Jika foto tidak diubah
        $koneksi->query("UPDATE produk SET nama='{$_POST['nama']}', harga='{$_POST['harga']}', berat='{$_POST['berat']}',
        deskripsi='{$_POST['deskripsi']}' WHERE idproduk='{$_GET['id']}'");
    }

    echo "<script>alert('Data produk berhasil diubah.');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>