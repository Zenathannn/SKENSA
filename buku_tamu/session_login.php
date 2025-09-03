<?php
session_start();

$username = $_POST['username'];
$pw       = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "db_buku_tamu");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil user berdasarkan username
$sql  = "SELECT * FROM admin WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // verifikasi password
    if (password_verify($pw, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header("Location: session_securepage.php");
        exit;
    } else {
        echo "<center><font color=red>USERNAME DAN PASSWORD SALAH!</font></center>";
        include "session_login.html";
    }
} else {
    echo "<center><font color=red>USERNAME DAN PASSWORD SALAH!</font></center>";
    include "session_login.html";
}
?>
