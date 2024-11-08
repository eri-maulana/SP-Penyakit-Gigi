<?php
date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['proses'])) {

    // mengambil data dari form
    $nama = $_POST['nama'];
    $tanggal = date("Y-m-d");

    // proses simpan konsultasi
    $sql = "INSERT INTO konsultasi VALUES (null,'$tanggal','$nama')";
    mysqli_query($koneksi, $sql);

    // mengambil data aturan
    $idgejala = $_POST['idgejala'];

    // proses mengambil data konsultasi
    $sql = "SELECT * FROM konsultasi ORDER BY idkonsultasi DESC";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    $idkonsultasi = $row['idkonsultasi'];

    // proses simpan detail basis aturan
    $jumlah = count($idgejala);
    $i = 0;
    while ($i < $jumlah) {
        $idgejalanya = $idgejala[$i];
        $sql = "INSERT INTO detail_konsultasi VALUES ('$idkonsultasi','$idgejalanya')";
        mysqli_query($koneksi, $sql);
        $i++;
    }

    // mengambil data dari tabel penyakit untuk pengecekan basis aturan
    $sql = "SELECT*FROM penyakit";
    $result = $koneksi->query($sql);
    while ($row = $result->fetch_assoc()) {

        $idpenyakit = $row['idpenyakit'];
        $jml_ya = 0;

        // proses mencari jumlah gejala di basis aturan berdasarkan penyakit
        $sql2 = "SELECT COUNT(idpenyakit) AS jml_gejala FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.idaturan=detail_basis_aturan.idaturan WHERE idpenyakit='$idpenyakit'";
        $result2 = $koneksi->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jml_gejala = $row2['jml_gejala'];

        // proses mencari gejala pada basis aturan
        $sql3 = "SELECT idpenyakit, idgejala FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.idaturan=detail_basis_aturan.idaturan WHERE idpenyakit='$idpenyakit'";
        $result3 = $koneksi->query($sql3);
        while ($row3 = $result3->fetch_assoc()) {
            $idgejalanya = $row3['idgejala'];

            // membandingkan , apakah yang dipilih pada konsultasi sesuai dengan basis aturan
            $sql4 = "SELECT idgejala FROM detail_konsultasi WHERE idkonsultasi='$idkonsultasi' AND idgejala='$idgejalanya'";
            $result4 = $koneksi->query($sql4);
            if ($result4->num_rows > 0) {
                $jml_ya += 1;
            }
        }

        // mencari persentase
        if ($jml_gejala > 0) {
            $persentase = round(($jml_ya/$jml_gejala)*100,2);
        } else {
            $persentase = 0;
        }

        // simpan data detail penyakit
        if ($persentase > 0) {
            $sql = "INSERT INTO detail_penyakit VALUES ('$idkonsultasi','$idpenyakit','$persentase')";
            mysqli_query($koneksi, $sql);
        }
        header("Location:?page=konsultasi&action=hasil&idkonsultasi=$idkonsultasi");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Basis Aturan</title>
</head>

<body>


    <div class="row mb-5">
        <div class="col-sm-12">
            <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
                <div class="card border-dark">
                    <div class="card">
                        <div class="card-header bg-success text-white border-light"><strong>Konsultasi</strong></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Pasien</label>
                                <input type="text" name="nama" id="nama" maxlength="50" class="form-control" required>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM gejala ORDER BY kode_gejala ASC";
                                        $result = $koneksi->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" class="check-item" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>">
                                                </td>
                                                <td class="text-center"><?php echo $row['kode_gejala']; ?></td>
                                                <td><?php echo $row['nmgejala']; ?></td>

                                            </tr>
                                        <?php
                                        }
                                        $koneksi->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-success btn-lg" type="submit" name="proses" value="Proses">
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function validasiForm() {

            // validasi gejala yang belum dipilih
            var checkbox = document.getElementsByName('<?php echo 'idgejala[]'; ?>');

            var isChecked = false;

            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            // jika belum ada yang di ceklis
            if (!isChecked) {
                alert("Pilih terlebih dahulu gejala yang dialami!, min 1 gejala");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>