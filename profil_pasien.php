<?php
session_start();

// Proteksi Halaman: Kembalikan ke login jika belum login atau bukan pasien
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'pasien') {
    header("Location: login.php");
    exit;
}

// Muat dependensi OOP
require_once 'config/Database.php';
require_once 'models/CrudInterface.php';
require_once 'models/Person.php';
require_once 'models/User.php';

// Ambil data pasien dari database berdasarkan session ID
$userModel = new \Models\User();
$pasienData = $userModel->getUserById($_SESSION['user_id']);

require_once 'views/layouts/header.php'; 
?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
    <div class="nav-buttons">
        <a href="proses_logout.php" class="btn btn-logout">Logout</a>
    </div>
</nav>

<div class="profile-container">
    <div class="profile-card">
        
        <div class="profile-header">
            <img src="assets/img/pasien_picture.jpg" alt="Foto Profil" class="profile-pic">
            <div class="profile-title">
                <h2><?= htmlspecialchars($pasienData['nama']); ?></h2>
                <p>Status: <span style="color: #689F38; font-weight: bold;">Terverifikasi</span></p>
            </div>
        </div>

        <form action="#" method="POST">
            
            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <input type="text" name="nama" value="<?= htmlspecialchars($pasienData['nama']); ?>" readonly>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                <input type="email" name="email" value="<?= htmlspecialchars($pasienData['email']); ?>" readonly>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                <input type="tel" name="nohp" value="<?= htmlspecialchars($pasienData['no_hp'] ?? ''); ?>" readonly>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="button" class="btn btn-register" style="flex: 1;">Edit Profil</button>
                <a href="riwayat_pasien.php" class="btn btn-riwayat" style="flex: 1; text-align: center; text-decoration: none;">Riwayat</a>
                <a href="form_reservasi.php" class="btn btn-home" style="flex: 1; text-align: center; text-decoration: none;">Buat Reservasi</a>
            </div>

        </form>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>