<?php
$conn = new mysqli("localhost", "root", "", "db_buku_tamu");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM buku_tamu ORDER BY tanggal_bertamu DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            color: #fff;
        }
        h1 {
            margin-top: 30px;
        }
        hr {
            width: 60%;
            border: 1px solid #fff;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
            color: #000;
        }
        th {
            background: #2575fc;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f2f2f2;

        }
        tr:nth-child(odd) {
            background: #ffffff;
        }
        a {
            text-decoration: none;
            color: #fff;
            background: #e74c3c;
            padding: 6px 12px;
            border-radius: 6px;
            transition: 0.3s;
        }
        a:hover {
            background: #c0392b;
        }
        td a {
            color: #fff;
        }
    </style>
</head>
<body>
<center>
    <h1>DAFTAR TAMU</h1>
    <hr>
    <table border="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Pesan</th>
            <th>Tanggal Bertamu</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['nama_tamu']}</td>
                        <td>{$row['alamat_tamu']}</td>
                        <td>{$row['notelp_tamu']}</td>
                        <td>{$row['pesan_tamu']}</td>
                        <td>{$row['tanggal_bertamu']}</td>
                        <td><a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin hapus data?\")'>Hapus</a></td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</center>
</body>
</html>
<?php
$conn->close();
?>
