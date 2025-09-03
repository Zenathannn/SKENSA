<?php
include "session_check.php";
?>
<html>
<center>
    <p align="right">
        <a href="session_logout.php">
            <font color="blue" size="6">Log Out</font>
        </a>
    </p>

    <h1>Halo Selamat Datang 
        <?php  
            echo $_SESSION['username']; 
        ?>
        </h1>
        <p>Anda sekarang sudah masuk ke dalam sistem</p>
        <hr>
        <?php
            include "tampil.php";
        ?>
</center>
</html>