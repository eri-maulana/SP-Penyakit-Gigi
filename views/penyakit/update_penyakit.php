<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Penyakit</title>
</head>

<body>
    <div>
        <?php
        // mengambil id dari parameter
        $idpenyakit = $_GET['id'];

        //proses update data 
        if (isset($_POST['update'])) {
            $kode_penyakit = $_POST['kode_penyakit'];
            $nmpenyakit = $_POST['nmpenyakit'];
            $keterangan = $_POST['keterangan'];
            $solusi = $_POST['solusi'];

            $sql = "UPDATE penyakit SET kode_penyakit='$kode_penyakit', nmpenyakit='$nmpenyakit', keterangan='$keterangan', solusi='$solusi' WHERE idpenyakit='$idpenyakit'";
            if ($koneksi->query($sql) === TRUE) {
                header("Location:?page=penyakit");
            }
        }



        $sql = "SELECT * FROM penyakit WHERE idpenyakit='$idpenyakit'";
        $result = $koneksi->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <!-- proses update data end -->

        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="card border-dark">
                        <div class="card">
                            <div class="card-header bg-success text-white border-light"><strong>Update Data Penyakit</strong></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_penyakit">Kode</label>
                                    <input id="kode_penyakit" type="text" class="form-control" name="kode_penyakit" maxlength="3" value="<?= $row['kode_penyakit'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nmpenyakit">Nama Penyakit</label>
                                    <input id="nmpenyakit" type="text" class="form-control" name="nmpenyakit" maxlength="200" value="<?= $row['nmpenyakit'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input id="keterangan" type="text" class="form-control" name="keterangan" maxlength="1000" value="<?= $row['keterangan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="solusi">Solusi</label>
                                    <input id="solusi" type="text" class="form-control" name="solusi" maxlength="500" value="<?= $row['solusi'] ?>">
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" name="update" value="Update">
                                    <a class="btn btn-secondary" href="?page=penyakit">Batal</a>
                                </div>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>