<?php
session_start();

// Hancurkan semua data session
$_SESSION = array();
session_destroy();

// Arahkan kembali ke halaman utama
header("Location: home.php");
exit;