<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gejala</title>
</head>

<body>
    <div class="card mb-5">
        <div class="card-header bg-success text-white border-dark"><strong>Data Gejala</strong></div>
        <div class="card-body">
            <a class="btn btn-success mb-2" href="?page=gejala&action=tambah">Tambah</a>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th width="30px" class="text-center">No.</th>
                        <th width="100px" class="text-center">Kode</th>
                        <th width="400px">Nama Gejala</th>
                        <th width="100px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT*FROM gejala ORDER BY kode_gejala ASC";
                    $result = $koneksi->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $row['kode_gejala']; ?></td>
                            <td><?php echo $row['nmgejala']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" href="?page=gejala&action=update&id=<?php echo $row['idgejala']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger btn-sm" href="?page=gejala&action=hapus&id=<?php echo $row['idgejala']; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
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