<?php
session_start();

if (!isset($_SESSION['username'])) {
    // kalau belum login, lempar balik ke halaman login
    header("Location: session_login.html");
    exit;
}
?>
