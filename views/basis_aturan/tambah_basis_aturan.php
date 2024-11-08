<?php
// proses tambah data
if (isset($_POST['simpan'])) {
    // mengambil data dari form
    $nmpenyakit = $_POST['nmpenyakit'];
    $idgejala = $_POST['idgejala'];

    // validasi nama penyakit
    $sql = "SELECT basis_aturan.idaturan,basis_aturan.idpenyakit, penyakit.nmpenyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.idpenyakit=penyakit.idpenyakit WHERE nmpenyakit='$nmpenyakit'";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data basis aturan penyakit sudah tersedia!</strong>
        </div>
<?php
    } else {
        // prosesmengambil data penyakit
        $sql = "SELECT * FROM penyakit WHERE nmpenyakit='$nmpenyakit'";
        $result = $koneksi->query($sql);
        $row = $result->fetch_assoc();
        $idpenyakit = $row['idpenyakit'];

        //proses simpan basis aturan
        $sql = "INSERT INTO basis_aturan VALUES (null,'$idpenyakit')";
        mysqli_query($koneksi, $sql);

        // proses mengambil data aturan
        $sql = "SELECT * FROM basis_aturan ORDER BY idaturan DESC";
        $result = $koneksi->query($sql);
        $row = $result->fetch_assoc();
        $idaturan = $row['idaturan'];

        // proses simpan detail basis aturan
        $jumlah = count($idgejala);
        $i = 0;
        while ($i < $jumlah) {
            $idgejalanya = $idgejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ('$idaturan','$idgejalanya')";
            mysqli_query($koneksi, $sql);
            $i++;
        }
        header("Location:?page=basis_aturan");
    }
}
// proses tambah data end 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Basis Aturan</title>
</head>

<body>


    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
                <div class="card border-dark">
                    <div class="card">
                        <div class="card-header bg-success text-white border-light"><strong>Tambah Data Basis Aturan</strong></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nmpenyakit">Nama Penyakit</label>
                                <select class="form-control chosen" data-placeholder="Pilih Nama Penyakit" name="nmpenyakit">
                                    <option value=""></option>
                                    <?php
                                    $sql = "SELECT * FROM penyakit ORDER BY kode_penyakit ASC";
                                    $result = $koneksi->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['nmpenyakit']; ?>"><?php echo $row['kode_penyakit'] . " - " . $row['nmpenyakit']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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
                                <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                                <a class="btn btn-secondary" href="?page=basis_aturan">Batal</a>
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function validasiForm() {
            // validasi nama penyakit
            var nmpenyakit = document.forms["Form"]["nmpenyakit"].value;
            if (nmpenyakit == "") {
                alert("Pilih terlebih dahulu nama penyakitnya!");
                return false;
            }

            // validasi gejala yang belum dipilih
            var checkbox = document.getElementsByName('<?php echo 'idgejala[]'; ?>');

            var isChecked = false;

            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            // jika belum ada yang di checked
            if (!isChecked) {
                alert("Pilih terlebih dahulu gejala yang dialami!, min 1 gejala");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>