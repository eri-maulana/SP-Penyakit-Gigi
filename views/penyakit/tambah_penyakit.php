<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penyakit</title>
</head>

<body>
    <div>
        <?php
        // proses tambah data
        if (isset($_POST['simpan'])) {
            // mengambil data dari form
            $kode_penyakit = $_POST['kode_penyakit'];
            $nmpenyakit = $_POST['nmpenyakit'];
            $keterangan = $_POST['keterangan'];
            $solusi = $_POST['solusi'];

            
                //proses simpan
                $sql = "INSERT INTO penyakit VALUES (null,'$kode_penyakit','$nmpenyakit','$keterangan','$solusi')";
                if ($koneksi->query($sql) === TRUE) {
                    header("Location:?page=penyakit");
                }
            }
        
        ?>
        <!-- proses tambah data end -->

        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="card border-dark">
                        <div class="card">
                            <div class="card-header bg-success text-white border-light"><strong>Tambah Data Penyakit</strong></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_penyakit">Kode</label>
                                    <input id="kode_penyakit" type="text" class="form-control" name="kode_penyakit" maxlength="3" required>
                                </div>
                                <div class="form-group">
                                    <label for="nmpenyakit">Nama Penyakit</label>
                                    <input id="nmpenyakit" type="text" class="form-control" name="nmpenyakit" maxlength="200" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input id="keterangan" type="text" class="form-control" name="keterangan" maxlength="1000" >
                                </div>
                                <div class="form-group">
                                    <label for="solusi">Solusi</label>
                                    <input id="solusi" type="text" class="form-control" name="solusi" maxlength="500" >
                                </div>

                                <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                                <a class="btn btn-secondary" href="?page=penyakit">Batal</a>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>