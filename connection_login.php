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
    $npm = mysqli_real_escape_string($koneksi, $_POST['npm']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);

    // Menyiapkan query
    $query = "INSERT INTO sv_login (npm, nama, kelas) VALUES ('$npm', '$nama', '$kelas')";

    // Menjalankan query
    $hasil = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($hasil) {
        // Mengarahkan ke display_data.php
        header('Location: ' . $_GET['redirect']);
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>