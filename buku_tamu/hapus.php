<?php
$conn = new mysqli("localhost", "root", "", "db_buku_tamu");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // keamanan: ubah ke integer
    $sql = "DELETE FROM buku_tamu WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: tampil.php"); // kembali ke halaman daftar tamu
        exit();
    } else {
        echo "Error menghapus data: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
