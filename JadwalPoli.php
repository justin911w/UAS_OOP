<?php require_once 'views/layouts/header.php'; ?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
    <div class="nav-buttons">
        <a href="home.php" class="btn btn-home">Home</a>
        <a href="login.php" class="btn btn-login">Login</a>
        <a href="registrasi.php" class="btn btn-register">Registrasi</a>
    </div>
</nav>

<div class="admin-container" style="padding: 40px 20px; display: block; max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="color: #333; margin-bottom: 10px;">Jadwal Praktik Poli & Dokter</h1>
        <p style="color: #666;">Silakan sesuaikan waktu kunjungan Anda dengan jadwal operasional poli kami di bawah ini.</p>
    </div>

    <div class="table-container" style="background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #f4f6f9; border-bottom: 2px solid #dee2e6;">
                    <th style="padding: 15px; color: #495057; font-weight: 600;">Nama Poli</th>
                    <th style="padding: 15px; color: #495057; font-weight: 600;">Dokter Spesialis</th>
                    <th style="padding: 15px; color: #495057; font-weight: 600;">Hari Operasional</th>
                    <th style="padding: 15px; color: #495057; font-weight: 600;">Jam Praktik</th>
                </tr>
            </thead>
           
<tbody>
    <!-- Poli Umum -->
    <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 15px; font-weight: bold; color: #2E7D32;">Poli Umum</td>
        <!-- Kolom Dokter dengan Foto Bulat -->
        <td style="padding: 15px; display: flex; align-items: center; gap: 12px;">
            <img src="assets/img/dokter_picture.jpg" alt="Dr. Budi" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <span>Dr. Budi Santoso</span>
        </td>
        <td style="padding: 15px;">Senin - Jumat</td>
        <td style="padding: 15px;">08:00 - 16:00</td>
    </tr>
    
    <!-- Poli Gigi -->
    <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 15px; font-weight: bold; color: #2E7D32;">Poli Gigi</td>
        <!-- Kolom Dokter dengan Foto Bulat -->
        <td style="padding: 15px; display: flex; align-items: center; gap: 12px;">
            <img src="assets/img/dokter_picture.jpg" alt="Dr. Siska" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <span>Dr. Siska Pratama</span>
        </td>
        <td style="padding: 15px;">Senin, Rabu, Jumat</td>
        <td style="padding: 15px;">09:00 - 14:00</td>
    </tr>

    <!-- Poli Anak -->
    <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 15px; font-weight: bold; color: #2E7D32;">Poli Anak</td>
        <!-- Kolom Dokter dengan Foto Bulat -->
        <td style="padding: 15px; display: flex; align-items: center; gap: 12px;">
            <img src="assets/img/dokter_picture.jpg" alt="Dr. Andi" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <span>Dr. Andi Wijaya</span>
        </td>
        <td style="padding: 15px;">Selasa & Kamis</td>
        <td style="padding: 15px;">10:00 - 15:00</td>
    </tr>

    <!-- Poli Mata -->
    <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 15px; font-weight: bold; color: #2E7D32;">Poli Mata</td>
        <!-- Kolom Dokter dengan Foto Bulat -->
        <td style="padding: 15px; display: flex; align-items: center; gap: 12px;">
            <img src="assets/img/dokter_picture.jpg" alt="Dr. Maria" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <span>Dr. Maria Elena</span>
        </td>
        <td style="padding: 15px;">Sabtu</td>
        <td style="padding: 15px;">08:00 - 12:00</td>
    </tr>
</tbody>

        </table>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <p style="color: #555; margin-bottom: 15px;">Sudah tahu jadwal yang cocok? Daftarkan diri Anda sekarang.</p>
        <a href="registrasi.php" class="btn btn-register" style="padding: 12px 30px; text-decoration: none; display: inline-block;">Buat Reservasi Sekarang</a>
    </div>
</div>

<div class="footer-address">
    <hr>
    <p>Jl. Tanjung Duren no.6 Jakarta Barat | +62 8767</p>
</div>

<?php require_once 'views/layouts/footer.php'; ?>