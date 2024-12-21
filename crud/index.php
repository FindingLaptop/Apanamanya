<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>CRUD</title>
    <style>
        .navbar-brand {
            margin-left: 50px;
            font-family: Poppins, sans-serif;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">22574003_Erdiansyah</span>
    </nav>
    <div class="container">
        <br>
        <h4><center>DAFTAR PESERTA PELATIHAN</center></h4>
        <?php
        include "koneksi.php";

        // cek apakah ada kiriman form dari method GET
        if (isset($_GET['id_peserta'])) {
            $id_peserta = htmlspecialchars($_GET["id_peserta"]);

            $sql = "DELETE FROM peserta WHERE id_peserta='$id_peserta'";
            $hasil = mysqli_query($kon, $sql);

            // kondisi berhasil atau tidak
            if ($hasil) {
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus: " . mysqli_error($kon) . "</div>";
            }
        }
        ?>

        <table class="table table-bordered my-3">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Jurusan</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM peserta ORDER BY id_peserta DESC";
            $hasil = mysqli_query($kon, $sql);

            if (!$hasil) {
                echo "<div class='alert alert-danger'> Error dalam menjalankan kueri: " . mysqli_error($kon) . "</div>";
            } else {
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                        <td><?php echo htmlspecialchars($data["sekolah"]); ?></td>
                        <td><?php echo htmlspecialchars($data["jurusan"]); ?></td>
                        <td><?php echo htmlspecialchars($data["no_hp"]); ?></td>
                        <td><?php echo htmlspecialchars($data["alamat"]); ?></td>
                        <td>
                            <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>
</html>
