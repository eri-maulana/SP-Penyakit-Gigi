<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Gejala</title>
</head>

<body>
    <div>
        <?php
        // proses tambah data
        if (isset($_POST['simpan'])) {
            // mengambil data dari form
            $nmgejala = $_POST['nmgejala'];
            $kode_gejala = $_POST['kode_gejala'];


            //proses simpan
            $sql = "INSERT INTO gejala VALUES (null,'$kode_gejala','$nmgejala')";
            if ($koneksi->query($sql) === TRUE) {
                header("Location:?page=gejala");
            }
        }

        ?>
        <!-- proses tambah data end -->

        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="card border-dark">
                        <div class="card">
                            <div class="card-header bg-success text-white border-light"><strong>Tambah Data Gejala</strong></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_gejala">Kode</label>
                                    <input id="kode_gejala" type="text" class="form-control" name="kode_gejala" maxlength="3" required>
                                </div>
                                <div class="form-group">
                                    <label for="nmgejala">Nama Gejala</label>
                                    <input id="nmgejala" type="text" class="form-control" name="nmgejala" maxlength="200" required>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                                    <a class="btn btn-secondary" href="?page=gejala">Batal</a>
                                </div>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>