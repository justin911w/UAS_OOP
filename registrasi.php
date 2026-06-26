<?php require_once 'views/layouts/header.php'; ?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
    <div class="nav-buttons">
        <a href="home.php" class="btn btn-home">Home</a>
        <a href="login.php" class="btn btn-login">Login</a>
    </div>
</nav>

<div class="auth-container">
    <div class="auth-card">
        
        <h2 class="auth-title">Registrasi</h2>
        
        <form action="proses_registrasi.php" method="POST">
            
            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <input type="text" name="nama" placeholder="Nama" required>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                <input type="tel" name="nohp" placeholder="No.Hp" required>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-submit">Daftar</button>

        </form>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>