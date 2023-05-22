<h2>Data Pembelian</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembeli JOIN pelanggan ON pembeli.
        idpelanggan=pelanggan.idpelanggan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama'] ?></td>
                <td><?php echo $pecah['tgl'] ?></td>
                <td><?php echo $pecah['total'] ?></td>
                <td>
                    <a href="index.php?halaman=detail&id=<?php echo $pecah['idpembeli']; ?>" class="btn btn-info">detail</a>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>