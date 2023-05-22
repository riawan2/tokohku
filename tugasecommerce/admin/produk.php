<h2>halaman produk</h2>
<table class="table table-bordered">
    <thead>
        <th>no</th>
        <th>nama</th>
        <th>harga</th>
        <th>berat</th>
        <th>foto</th>
        <th>deskripsi</th>
        <th>jumlah</th>
        <th>aksi</th>
    </thead>
    <tbody>
        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $pecah['idproduk']; ?></td>
                <td><?php echo $pecah['nama']; ?></td>
                <td><?php echo $pecah['harga']; ?></td>
                <td><?php echo $pecah['berat']; ?></td>
                <td>
                    <img src="../fotoo/<?php echo $pecah['foto']; ?>" width="50">
                </td>
                <td><?php echo $pecah['deskripsi']; ?></td>
                <td><?php echo $pecah['jumla']; ?></td>
                <td>
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['idproduk']; ?>" class="btn-danger btn">hapus</a>
                    <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['idproduk']; ?>" class="btn btn-warning">ubah</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">tambah data</a>