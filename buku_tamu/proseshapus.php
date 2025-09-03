<?php
$id_tamu   = $_POST['hapus_id_tamu'];
$nama_tamu = $_POST['nama_tamu'];

$conn = mysqli_connect("localhost", "root", "", "db_buku_tamu");
$sql  = "DELETE FROM buku_tamu WHERE id='$id_tamu'";
$hasil = mysqli_query($conn, $sql);

if ($hasil) {
    echo "<br>Data $nama_tamu telah dihapus!";
} else {
    echo "<br>Data $nama_tamu gagal dihapus!";
}
?>
<br><a href="tampil.php">Kembali</a>