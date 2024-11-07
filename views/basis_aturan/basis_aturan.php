<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basis Aturan</title>
</head>

<body>
    <div class="card">
        <div class="card-header bg-success text-white border-dark"><strong>Data Basis Aturan</strong></div>
        <div class="card-body">
            <a class="btn btn-success mb-2" href="?page=basis_aturan&action=tambah">Tambah</a>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th width="30px">No. </th>
                        <th width="100px">Kode </th>
                        <th width="300px">Nama Penyakit</th>
                        <th width="500px">Keterangan </th>
                        <th width="150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM basis_aturan INNER JOIN penyakit ON basis_aturan.idpenyakit=penyakit.idpenyakit  ORDER BY kode_penyakit ASC";
                    $result = $koneksi->query($sql);
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['kode_penyakit']; ?></td>
                            <td><?php echo $row['nmpenyakit']; ?></td>
                            <td><?php echo $row['keterangan']; ?></td>
                            <td class="text-center">
                                <!-- tombol detail -->
                                <a class="btn btn-primary btn-sm" href="?page=basis_aturan&action=detail&id=<?php echo $row['idaturan']; ?>">
                                    <i class="fas fa-list"></i>
                                </a>
                                <!-- tombol detail end -->

                                <!-- tombol edit -->
                                <a class="btn btn-warning btn-sm" href="?page=basis_aturan&action=update&id=<?php echo $row['idaturan']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- tombol edit end -->

                                <!-- tombol hapus -->
                                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger btn-sm" href="?page=basis_aturan&action=hapus&id=<?php echo $row['idaturan']; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <!-- tombol hapus end -->
                            </td>
                        </tr>
                    <?php
                    }
                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>