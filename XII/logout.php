<?php

// mengaktifkan session php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id_level']);
// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman login
header("location: index.php?pesan=logout");

?>