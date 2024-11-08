<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
</head>

<body>
    <div class="card">
        <div class="card-header bg-success text-white border-dark"><strong>Data Pengguna</strong></div>
        <div class="card-body">
            <a class="btn btn-success mb-2" href="?page=users&action=tambah">Tambah</a>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th width="30px">No.</th>
                        <th width="150px">Username</th>
                        <th width="200px">Password</th>
                        <th width="300px">Role</th>
                        <th width="100px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT*FROM users ORDER BY username ASC";
                    $result = $koneksi->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td class="text-center ">
                                <a class="btn btn-warning btn-sm " href="?page=users&action=update&id=<?php echo $row['idusers']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger btn-sm" href="?page=users&action=hapus&id=<?php echo $row['idusers']; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>