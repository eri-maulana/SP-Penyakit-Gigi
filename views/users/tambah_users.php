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
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $role = $_POST['role'];


            //proses simpan
            $sql = "INSERT INTO users VALUES (null,'$username','$password','$role')";
            if ($koneksi->query($sql) === TRUE) {
                header("Location:?page=users");
            }
        }

        ?>
        <!-- proses tambah data end -->

        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="card border-dark">
                        <div class="card">
                            <div class="card-header bg-success text-white border-light"><strong>Tambah Data Pengguna</strong></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" maxlength="200" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" maxlength="1000">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control chosen" data-placeholder="Pilih Role" name="role">
                                        <option value=""></option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Petugas">Petugas</option>
                                        <option value="Pasien">Pasien</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                                    <a class="btn btn-secondary" href="?page=users">Batal</a>
                                </div>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>