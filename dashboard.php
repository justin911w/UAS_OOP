<?php
// Blok global namespace untuk memuat dependensi dasar OOP dan Router
namespace {
    // Memulai session untuk fitur autentikasi (wajib)
    session_start();

    // Memuat konfigurasi database
    require_once 'config/Database.php';
    
    // Memuat kontrak Interface dan Abstract Class (wajib OOP)
    require_once 'models/CrudInterface.php';
    require_once 'models/Person.php';
    
    // Memuat kelas-kelas Model turunan (wajib OOP)
    require_once 'models/Poli.php';
    require_once 'models/Dokter.php';
    require_once 'models/Pasien.php';
    require_once 'models/Periksa.php';

    // Ambil parameter halaman dari URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    // Arahkan menggunakan jalur absolut __DIR__ agar file tidak salah baca
    switch ($page) {
        case 'poli':
            require_once __DIR__ . '/views/kelola_poli.php';
            break;
        case 'dokter':
            require_once __DIR__ . '/views/kelola_dokter.php';
            break;
        case 'pasien':
            require_once __DIR__ . '/views/kelola_pasien.php';
            break;
        case 'periksa':
            require_once __DIR__ . '/views/data_periksa.php';
            break;
        case 'dashboard':
        default:
            require_once __DIR__ . '/views/dashboard_admin.php';
            break;
    }
}