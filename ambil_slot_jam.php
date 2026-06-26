<?php
header('Content-Type: application/json');
require_once 'config/database.php';

if (!isset($_GET['id_dokter']) || !isset($_GET['tanggal'])) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
    exit;
}

$id_dokter = $_GET['id_dokter'];
$tanggal = $_GET['tanggal'];

try {
    $db = \Config\Database::getConnection();

    // 1. Ambil jadwal dari database
    $stmt = $db->prepare("SELECT jadwal FROM dokter WHERE id = ?");
    $stmt->execute([$id_dokter]);
    $dokter = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dokter) {
        echo json_encode(['status' => 'error', 'message' => 'Dokter tidak ditemukan']);
        exit;
    }

    // 2. Ekstrak teks jam kerja (contoh format: "Senin - Jumat (08:00 - 14:00)")
    preg_match('/\((.*?)\)/', $dokter['jadwal'], $matches);
    if (empty($matches)) {
        // Fallback jika format salah, di-set ke jam operasional umum
        $jam_mulai_kerja = "08:00";
        $jam_selesai_kerja = "16:00";
    } else {
        $waktu = explode('-', $matches[1]);
        $jam_mulai_kerja = trim($waktu[0]);
        $jam_selesai_kerja = trim($waktu[1]);
    }

    // 3. Cari jadwal yang sudah dibooking (dipesan) pada tanggal dan dokter tersebut
    $stmt_booked = $db->prepare("SELECT jam_mulai FROM periksa WHERE id_dokter = ? AND tanggal = ?");
    $stmt_booked->execute([$id_dokter, $tanggal]);
    $booked_slots = $stmt_booked->fetchAll(PDO::FETCH_COLUMN);

    $slot_tersedia = [];
    $start = strtotime($jam_mulai_kerja);
    $end = strtotime($jam_selesai_kerja);

    // 4. Hitung loop setiap 30 menit
    while ($start < $end) {
        $slot_jam = date('H:i', $start);
        $slot_jam_db = $slot_jam . ":00"; // MySQL format penyimpanan waktu (HH:MM:SS)

        // Cek jika jam tidak ada di array booked_slots
        if (!in_array($slot_jam_db, $booked_slots) && !in_array($slot_jam, $booked_slots)) {
            $slot_tersedia[] = $slot_jam;
        }
        $start = strtotime('+30 minutes', $start);
    }

    if (empty($slot_tersedia)) {
        echo json_encode(['status' => 'empty', 'message' => 'Maaf, semua slot waktu sudah penuh']);
    } else {
        echo json_encode(['status' => 'success', 'data' => $slot_tersedia]);
    }

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan koneksi']);
}