<?php
// mengambil id dari parameter
$idaturan = $_GET['id'];

// proses menampilkan data penyakit berdasarkan basis aturan yang dipilih
$sql = "SELECT * FROM basis_aturan INNER JOIN penyakit ON basis_aturan.idpenyakit = penyakit.idpenyakit WHERE idaturan='$idaturan'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $idgejala = $_POST['idgejala'];

    // proses simpan detail basis aturan
    if ($idgejala != null) {
        $jumlah = count($idgejala);
        $i = 0;
        while ($i < $jumlah) {
            $idgejalanya = $idgejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ('$idaturan','$idgejalanya')";
            mysqli_query($koneksi, $sql);
            $i++;
        }
    }
    header("Location:?page=basis_aturan");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Basis Aturan</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST">
                <div class="card border-dark">
                    <div class="card">
                        <div class="card-header bg-success text-white border-light"><strong>Update Data Basis Aturan</strong></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_penyakit">Kode Penyakit</label>
                                <input type="text" class="form-control" name="kode_penyakit" id="" value="<?= $row['kode_penyakit']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nmpenyakit">Nama Penyakit</label>
                                <input type="text" class="form-control" name="nmpenyakit" value="<?= $row['nmpenyakit']; ?>" readonly>
                            </div>

                            <!-- tabel data gejala -->
                            <div class="form-group">
                                <label for="nmpenyakit">Pilih gejala-gejala yang dialami: </label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="30px"></th>
                                            <th class="text-center" width="100px">Kode Gejala</th>
                                            <th width="500px">Nama Gejala</th>
                                            <th width="30px" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM gejala ORDER BY kode_gejala ASC";
                                        $result = $koneksi->query($sql);
                                        while ($row = $result->fetch_assoc()) {

                                            $idgejala = $row['idgejala'];

                                            // cek ke tabel detail basis aturan
                                            $sql2 = "SELECT * FROM detail_basis_aturan  WHERE idaturan='$idaturan' AND idgejala='$idgejala'";
                                            $result2 = $koneksi->query($sql2);
                                            if ($result2->num_rows > 0) {
                                                // tampilkan datanya jika ditemukan
                                                // tidak bisa di ceklis
                                                // ada aksi hapus ceklis
                                        ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="check-item" disabled="disabled">
                                                    </td>
                                                    <td class="text-center"><?php echo $row['kode_gejala']; ?></td>
                                                    <td><?php echo $row['nmgejala']; ?></td>
                                                    <td class="text-center">
                                                        <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger btn-sm" href="?page=basis_aturan&action=hapus_gejala&idaturan=<?php echo $idaturan; ?>&idgejala=<?php echo $idgejala; ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            } else {
                                                // bisa di ceklis 
                                                // tidak ada aksi hapus ceklis
                                            ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="check-item" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>">
                                                    </td>
                                                    <td class="text-center"><?php echo $row['kode_gejala']; ?></td>
                                                    <td><?php echo $row['nmgejala']; ?></td>
                                                    <td class="text-center">
                                                        <i class="fas fa-trash"></i>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        $koneksi->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <input class="btn btn-success" type="submit" name="update" value="Update">
                            <a class="btn btn-secondary" href="?page=basis_aturan">Batal</a>

                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>