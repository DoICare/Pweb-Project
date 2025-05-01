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

// Query untuk mengambil data dari tabel sv_profile
$query = "SELECT * FROM sv_profile";
$hasil = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dijalankan
if (!$hasil) {
    die("Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
                .navbar {
            background-color: #0f233a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 35px;
        }

        /* Styling untuk bagian kiri (logo) */
        .navbar-left {
            flex: 1;
        }

        /* Styling untuk bagian tengah (judul) */
        .navbar-center {
            flex: 2;
            text-align: center;
        }

        .navbar-center h1 {
            color: rgb(58, 58, 255);
            font-size: 1.5em;
            margin: 0;
            transition: transform 0.2s ease-in-out;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-center h1:hover {
            transform: scale(1.1);
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        /* Styling untuk bagian kanan (tombol login) */
        .navbar-right {
            flex: 1;
            text-align: right;
        }

        /* Styling untuk tombol login */
        .login-button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-size: 1em;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-button:hover {
            background-color: #555;
        }

        /* Styling untuk gambar di navbar */
        .navbar-icon {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            transition: transform 0.2s ease-in-out;
        }

        .navbar-icon:hover {
            transform: scale(1.1);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0f233a;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <!-- Logo Login di sebelah kiri -->
        <div class="navbar-left">
            <a href="profile.html"><img src="Profile.png" alt="profile" class="navbar-icon"></a>
        </div>

        <!-- Judul di tengah -->
        <div class="navbar-center">
            <h1><a href="index.html" style="color: white; text-decoration: none;">Homepage</a></h1>
        </div>

        <!-- Tombol "Profile" di sebelah kanan -->
        <div class="navbar-right">
            <a href="login.html" class="login-button">Login</a>
        </div>
    </div>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data dari database
                while ($row = mysqli_fetch_assoc($hasil)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Menutup koneksi
mysqli_close($koneksi);
?>