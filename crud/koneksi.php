<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "crud"; 

// Membuat koneksi ke database
$kon = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
