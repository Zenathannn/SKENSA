<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $raw_password = $_POST['password'];

    //koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "db_buku_tamu");
    if (!$conn) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }

    //cek apakah username sudah ada
    $check_sql = "SELECT * FROM admin WHERE username = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<center style='font-family:Arial; margin-top:50px;'>
                <p style='color:red; font-size:18px; font-weight:bold;'>⚠ Username sudah digunakan!</p>
                <a href='session_registrasi.html' style='text-decoration:none; color:white; background:#483AA0; padding:8px 15px; border-radius:5px;'>🔙 Kembali ke Registrasi</a>
              </center>";
        exit();
    }

    //enkripsi password
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

    //simpan ke database
    $sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        echo "<center style='font-family:Arial; margin-top:50px;'>
                <p style='color:#483AA0; font-size:18px; font-weight:bold;'>✔ Registrasi Berhasil</p>
                <a href='session_login.html' style='text-decoration:none; color:white; background:#483AA0; padding:8px 15px; border-radius:5px;'>➡ Menuju Login</a>
              </center>";
    } else {
        echo "<center style='font-family:Arial; margin-top:50px;'>
                <p style='color:red; font-size:18px; font-weight:bold;'>❌ Gagal Mendaftar. Coba Lagi</p>
                <a href='session_registrasi.html' style='text-decoration:none; color:white; background:#483AA0; padding:8px 15px; border-radius:5px;'>🔄 Ulangi</a>
              </center>";
    }
} else {
    header("Location: session_registrasi.html");
    exit();
}
?>
