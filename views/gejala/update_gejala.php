<!-- proses update data -->
<?php
        // mengambil id dari parameter
        $idgejala = $_GET['id'];

        // 
        if (isset($_POST['update'])) {
            $kode_gejala = $_POST['kode_gejala'];
            $nmgejala = $_POST['nmgejala'];

            // proses update data
            $sql = "UPDATE gejala SET kode_gejala='$kode_gejala', nmgejala='$nmgejala' WHERE idgejala='$idgejala'";
            if ($koneksi->query($sql) === TRUE) {
                header("Location:?page=gejala");
            }
        }



        $sql = "SELECT * FROM gejala WHERE idgejala='$idgejala'";
        $result = $koneksi->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <!-- proses update data end -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Gejala</title>
</head>

<body>
    <div>
        

        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="card border-dark">
                        <div class="card">
                            <div class="card-header bg-success text-white border-light"><strong>Update Data Gejala</strong></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_gejala">Kode</label>
                                    <input id="kode_gejala" type="text" class="form-control" name="kode_gejala" maxlength="3" value="<?= $row['kode_gejala'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nmgejala">Nama Gejala</label>
                                    <input id="nmgejala" type="text" class="form-control" name="nmgejala" maxlength="200" value="<?= $row['nmgejala'] ?>" required>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" name="update" value="Update">
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