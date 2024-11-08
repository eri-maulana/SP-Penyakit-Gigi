<!-- proses menampilkan data basis aturan -->
<?php
// mengambil id dari parameter
$idaturan = $_GET['id'];


$sql = "SELECT * FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.idaturan = detail_basis_aturan.idaturan INNER JOIN penyakit ON basis_aturan.idpenyakit = penyakit.idpenyakit INNER JOIN gejala ON detail_basis_aturan.idgejala = gejala.idgejala WHERE basis_aturan.idaturan='$idaturan'";
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
                        <div class="card-header bg-success text-white border-dark"><strong>Detail Basis Aturan</strong></div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="" >Kode Penyakit</label>
                                <input type="text" class="form-control" value="<?php echo $row['kode_penyakit'] ?>" name="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Penyakit</label>
                                <input type="text" class="form-control" value="<?php echo $row['nmpenyakit'] ?>" name="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" value="<?php echo $row['keterangan'] ?>" name="" readonly>
                            </div>
                            
                            <label for="Gejala"></label>
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
                                    $sql = "SELECT * FROM detail_basis_aturan INNER JOIN gejala ON detail_basis_aturan.idgejala = gejala.idgejala WHERE detail_basis_aturan.idaturan='$idaturan'";
                                    $result = $koneksi->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['kode_gejala']; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    $koneksi->close();
                                    ?>
                                </tbody>
                            </table>
                            

                            <div class="text-center">
                                <a class="btn btn-secondary " href="?page=basis_aturan">Kembali</a>
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>