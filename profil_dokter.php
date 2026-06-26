<?php require_once 'views/layouts/header.php'; ?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
    <div class="nav-buttons">
        <a href="home.php" class="btn btn-logout">Logout</a>
    </div>
</nav>

<div class="profile-container">
    <div class="profile-card">
        
        <div class="profile-header">
            <img src="assets/img/dokter_picture.jpg" alt="Foto Dokter" class="profile-pic">
            <div class="profile-title">
                <h2>Dokter</h2>
                <span class="doctor-badge">Spesialis Umum</span>
            </div>
        </div>

        <form action="#" method="POST">
            
            <div class="input-group">
                <input type="text" name="nama" value="Dokter" readonly>
            </div>

            <div class="input-group">
                <input type="email" name="email" value="dokter@klinik.com" readonly>
            </div>

            <div class="input-group">
                <input type="text" name="spesialis" value="Spesialis Umum" readonly>
            </div>

            <div class="schedule-section">
                <h4>Jadwal Praktik</h4>
                <ul class="schedule-list">
                    <li class="schedule-item"><span>Senin - Jumat</span> <span>08:00 - 16:00</span></li>
                    <li class="schedule-item"><span>Sabtu</span> <span>08:00 - 12:00</span></li>
                </ul>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="button" class="btn btn-register" style="flex: 1;">Edit Profil</button>
            </div>

        </form>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>