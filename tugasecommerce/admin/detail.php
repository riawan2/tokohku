<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembeli JOIN pelanggan
ON pembeli.idpelanggan=pelanggan.idpelanggan
WHERE pembeli.idpembeli='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<pre><?php print_r($detail); ?></pre>
<strong><?php echo $detail['nama']; ?></strong><br>
<p>
    <?php echo $detail['telepon']; ?><br>
    <?php echo $detail['email'] ?>
</p>
<p>
    tanggal:<?php echo $detail['tgl']; ?><br>
    Total:<?php echo $detail['total']; ?>
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembeliproduk JOIN produk ON
        pembeliproduk.idproduk=produk.idproduk WHERE pembeliproduk.idpembeli='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama']; ?></td>
                <td><?php echo $pecah['harga']; ?></td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td>
                    <?php echo $pecah['harga'] * $pecah['jumlah']; ?></td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>