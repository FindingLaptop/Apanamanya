<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Form Pendaftaran Peserta</title>
</head>
<body>
    <div class="container">
        <?php 
        include "koneksi.php";

        function input($data) {
            $data = trim($data);            
            $data = stripslashes($data);            
            $data = htmlspecialchars($data);            
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = input($_POST["nama"]);
            $sekolah = input($_POST["sekolah"]);
            $jurusan = input($_POST["jurusan"]);
            $no_hp = input($_POST["no_hp"]);
            $alamat = input($_POST["alamat"]);

            $sql = "INSERT INTO peserta (nama, sekolah, jurusan, no_hp, alamat) VALUES ('$nama', '$sekolah', '$jurusan', '$no_hp', '$alamat')";

            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location:index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
            }
        }
        ?>

        <h2>Input Data</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label>Nama :</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
            </div>
            <div class="form-group">
                <label>Sekolah :</label>
                <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah" required/>
            </div>
            <div class="form-group">
                <label>Jurusan :</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
            </div>
            <div class="form-group">
                <label>No HP :</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
            </div>
            <div class="form-group">
                <label>Alamat :</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
