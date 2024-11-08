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
        $idusers = $_GET['id'];

        //proses update data 
        if (isset($_POST['update'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $sql = "UPDATE users SET username='$username', password='$password', role='$role' WHERE idusers='$idusers'";
            if ($koneksi->query($sql) === TRUE) {
                header("Location:?page=users");
            }
        }



        $sql = "SELECT * FROM users WHERE idusers='$idusers'";
        $result = $koneksi->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <!-- proses update data end -->

        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="card border-dark">
                        <div class="card">
                            <div class="card-header bg-success text-white border-light"><strong>Update Data Pengguna</strong></div>
                            <div class="card-body">
                               
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" maxlength="25" value="<?= $row['username'] ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="text" class="form-control" name="password" maxlength="255" value="<?= $row['password'] ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control chosen" data-placeholder="Pilih Role" name="role">
                                        <option value="<?= $row['role'] ?>"><?= $row['role'] ?></option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Petugas">Petugas</option>
                                        <option value="Pasien">Pasien</option>
                                    </select>
                                </div>

                                <input class="btn btn-success" type="submit" name="update" value="Update">
                                <a class="btn btn-secondary" href="?page=penyakit">Batal</a>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>