<?php
session_start();

// Proteksi Halaman
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'pasien') {
    header("Location: login.php");
    exit;
}

require_once 'config/Database.php';
require_once 'models/CrudInterface.php';
require_once 'models/Person.php';
require_once 'models/User.php';

$userModel = new \Models\User();
$userId = $_SESSION['user_id'];
$errorMsg = '';

// Proses Pembaruan Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass1 = $_POST['password_baru'];
    $pass2 = $_POST['konfirmasi_password'];

    // Validasi apakah password baru dan konfirmasi cocok
    if (!empty($pass1) && $pass1 !== $pass2) {
        $errorMsg = "Konfirmasi password tidak cocok!";
    } else {
        $dataUpdate = [
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'nohp' => $_POST['nohp'],
            'password' => $pass1 // Bisa kosong jika user tidak ingin ganti password
        ];

        if ($userModel->update($userId, $dataUpdate)) {
            $_SESSION['user_nama'] = $dataUpdate['nama']; // Update nama di session
            echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='profil_pasien.php';</script>";
            exit;
        } else {
            $errorMsg = "Gagal memperbarui profil. Silakan coba lagi.";
        }
    }
}

// Ambil data terbaru untuk diisi ke dalam form
$pasienData = $userModel->getUserById($userId);
require_once 'views/layouts/header.php'; 
?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
    <div class="nav-buttons">
        <a href="profil_pasien.php" class="btn btn-home">Kembali ke Profil</a>
    </div>
</nav>

<div class="profile-container">
    <div class="profile-card">
        
        <div style="text-align: center; margin-bottom: 20px;">
            <h2>Edit Profil</h2>
            <p style="color: #666;">Perbarui informasi pribadi dan keamanan akun Anda.</p>
        </div>

        <?php if ($errorMsg): ?>
            <div style="background-color: #ffdddd; color: #d8000c; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                <?= $errorMsg; ?>
            </div>
        <?php endif; ?>

        <form action="edit_profil.php" method="POST">
            
            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <input type="text" name="nama" value="<?= htmlspecialchars($pasienData['nama']); ?>" required>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                <input type="email" name="email" value="<?= htmlspecialchars($pasienData['email']); ?>" required>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                <input type="tel" name="nohp" value="<?= htmlspecialchars($pasienData['no_hp'] ?? ''); ?>" required>
            </div>

            <hr style="margin: 30px 0 20px 0; border: 0; border-top: 1px solid #ddd;">
            <p style="font-size: 0.85rem; color: #888; margin-bottom: 15px; text-align: center;">
                *Kosongkan kolom password di bawah ini jika Anda tidak ingin mengubahnya.
            </p>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                <input type="password" name="password_baru" placeholder="Password Baru">
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
            </div>

            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <a href="profil_pasien.php" class="btn btn-register" style="flex: 1; text-align: center; text-decoration: none;">Batal</a>
                <button type="submit" class="btn btn-submit" style="flex: 1; margin-top: 0; box-shadow: none;">Simpan</button>
            </div>

        </form>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>