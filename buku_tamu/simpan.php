<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_buku_tamu");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama   = $_POST['nama_tamu'];
$alamat = $_POST['alamat_tamu'];
$telp   = $_POST['notelp_tamu'];
$pesan  = $_POST['pesan_tamu'];

// Simpan ke database
$sql = "INSERT INTO buku_tamu (nama_tamu, alamat_tamu, notelp_tamu, pesan_tamu, tanggal_bertamu) 
        VALUES ('$nama', '$alamat', '$telp', '$pesan', NOW())";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Buku Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #483AA0;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            width: 400px;
            margin: 100px auto;
            background: #fff;
            color: #333;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        }
        h1 {
            color: #483AA0;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #483AA0;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            transition: 0.3s;
        }
        a:hover {
            background: #52357B;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h1>✅ Berhasil!</h1>";
            echo "<p>Data telah disimpan ke dalam buku tamu.</p>";
            echo "<a href='daftar.html'>Kembali</a>";
        } else {
            echo "<h1 class='error'>❌ Gagal!</h1>";
            echo "<p>Gagal menyimpan data: " . $conn->error . "</p>";
            echo "<a href='daftar.html'>Kembali</a>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
