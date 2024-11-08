<!-- proses menampilkan data hasil konsultasi -->
<?php
// mengambil id dari parameter
$idkonsultasi = $_GET['idkonsultasi'];


$sql = "SELECT * FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Basis Aturan</title>
</head>

<body>
    <div class="row mb-5">
        <div class="col-sm-12">
            <form action="" method="POST">
                <div class="card border-dark">
                    <div class="card">
                        <div class="card-header bg-success text-white border-dark"><strong>Hasil Konsultasi</strong></div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nama">Nama Pasien</label>
                                <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama" id="nama" readonly>
                            </div>
                            
                            <label for="Gejala">Gejala - gejala yang dialami: </label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30px" class="text-center">Kode Gejala</th>
                                        <th width="500px">Nama Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM detail_konsultasi INNER JOIN gejala ON detail_konsultasi.idgejala = gejala.idgejala WHERE detail_konsultasi.idkonsultasi='$idkonsultasi'";
                                    $result = $koneksi->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['kode_gejala']; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- hasil konsultasi penyakitnya -->
                            <label for="Gejala">Hasil Konsultasi Penyakit: </label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30px" class="text-center">No.</th>
                                        <th width="150px" class="text-center">Kode Penyakit</th>
                                        <th width="200px">Nama Penyakit</th>
                                        <th width="30px" class="text-center">Persentase</th>
                                        <th width="400px">Solusi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM detail_penyakit INNER JOIN penyakit ON detail_penyakit.idpenyakit = penyakit.idpenyakit WHERE idkonsultasi='$idkonsultasi' ORDER  BY persentase DESC";
                                    $result = $koneksi->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td class="text-center"><?php echo $row['kode_penyakit']; ?></td>
                                        <td><?php echo $row['nmpenyakit']; ?></td>
                                        <td class="text-center"><?php echo $row['persentase'] . '%'; ?></td>
                                        <td><?php echo $row['solusi']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    $koneksi->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>