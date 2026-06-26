<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID dari akun yang sedang login
    $id_pasien = $_SESSION['user_id']; 
    $id_dokter = $_POST['id_dokter'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = $_POST['jam_mulai'];

    $db = \Config\Database::getConnection();

    // 1. Validasi Bentrok (Concurrency check)
    $stmt_cek = $db->prepare("SELECT id FROM periksa WHERE id_dokter = ? AND tanggal = ? AND jam_mulai = ?");
    $stmt_cek->execute([$id_dokter, $tanggal, $jam_mulai]);
    
    if ($stmt_cek->rowCount() > 0) {
        echo "<script>alert('Gagal! Slot jam ini baru saja diambil orang lain. Silakan pilih jam lain.'); window.history.back();</script>";
        exit;
    }

    // 2. Simpan Data Reservasi (Tanpa kolom id_poli sesuai koreksi tabel Anda)
    $query = "INSERT INTO periksa (id_pasien, id_dokter, tanggal, jam_mulai) VALUES (?, ?, ?, ?)";
    $stmt_insert = $db->prepare($query);
    
    if ($stmt_insert->execute([$id_pasien, $id_dokter, $tanggal, $jam_mulai])) {
        echo "<script>alert('Berhasil! Reservasi Anda telah terdaftar.'); window.location.href='profil_pasien.php';</script>";
    } else {
        echo "<script>alert('Gagal membuat reservasi. Silakan hubungi admin.'); window.history.back();</script>";
    }
}