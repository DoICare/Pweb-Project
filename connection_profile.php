<?php
// Informasi koneksi database
$host = "localhost"; // Nama host database
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi database
$database = "mahasiswa"; // Nama database

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);

    // Menyiapkan query
    $query = "INSERT INTO sv_profile (nama, email) VALUES ('$nama', '$email')";

    // Menjalankan query
    $hasil = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($hasil) {
        // Mengarahkan ke display_profile.php
        header('Location: ' . $_GET['redirect']);
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>