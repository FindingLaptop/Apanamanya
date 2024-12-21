<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Update Data Peserta</title>
</head>
<body>
    <div class="container">
        <?php
        include "koneksi.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_peserta = $_POST["id_peserta"];
            $nama = $_POST["nama"];
            $sekolah = $_POST["sekolah"];
            $jurusan = $_POST["jurusan"];
            $no_hp = $_POST["no_hp"];
            $alamat = $_POST["alamat"];

            $sql = "UPDATE peserta SET nama='$nama', sekolah='$sekolah', jurusan='$jurusan', no_hp='$no_hp', alamat='$alamat' WHERE id_peserta='$id_peserta'";
            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Data gagal diperbarui.</div>";
            }
        }

        // Mendapatkan data peserta berdasarkan id
        if (isset($_GET["id_peserta"])) {
            $id_peserta = $_GET["id_peserta"];
            $sql = "SELECT * FROM peserta WHERE id_peserta='$id_peserta'";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }
        ?>
        
        <h2>Update Data Peserta</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>">
            <div class="form-group">
                <label>Nama :</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Sekolah :</label>
                <input type="text" name="sekolah" class="form-control" value="<?php echo $data['sekolah']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jurusan :</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo $data['jurusan']; ?>" required>
            </div>
            <div class="form-group">
                <label>No HP :</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat :</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
