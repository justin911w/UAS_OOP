<?php 
$active_page = 'dashboard'; 
require_once 'views/layouts/header.php'; 

$poliModel = new \Models\Poli();
$dokterModel = new \Models\Dokter();
$pasienModel = new \Models\Pasien();
$periksaModel = new \Models\Periksa();

// Solusi Failsafe: Menggunakan ?: [] agar jika database gagal, hasilnya akan dihitung menjadi 0 (bukan false/bool)
$totalPoli = count($poliModel->read() ?: []);
$totalDokter = count($dokterModel->read() ?: []);
$totalPasien = count($pasienModel->read() ?: []);
$totalAntrean = count($periksaModel->read() ?: []);
?>

<div class="admin-container">
    <?php require_once 'views/layouts/sidebar_admin.php'; ?>

    <div class="admin-content">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang, Admin Klinik Kelompok 6.</p>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Poli</h3>
                <p><?= $totalPoli; ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Dokter</h3>
                <p><?= $totalDokter; ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Pasien</h3>
                <p><?= $totalPasien; ?></p>
            </div>
            <div class="stat-card">
                <h3>Antrean Hari Ini</h3>
                <p><?= $totalAntrean; ?></p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>