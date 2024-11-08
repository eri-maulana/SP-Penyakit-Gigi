<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Riwayat Konsultasi</title>
</head>

<body>
    <div class="card">
        <div class="card-header bg-success text-white border-dark"><strong>Data Riwayat Konsultasi</strong></div>
        <div class="card-body">
            
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th width="30px" class="text-center">No. </th>
                        <th width="100px" class="text-center">Tanggal </th>
                        <th width="300px">Nama Pasien</th>
                        <th width="150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM konsultasi ORDER BY tanggal DESC";
                    $result = $koneksi->query($sql);
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $row['tanggal']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td class="text-center">
                                <!-- tombol detail -->
                                <a class="btn btn-success btn-sm" href="?page=riwayat_konsultasi&action=detail&id=<?php echo $row['idkonsultasi']; ?>">
                                    <i class="fas fa-list"></i>
                                </a>
                                <!-- tombol detail end -->
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