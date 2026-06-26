<?php require_once 'views/layouts/header.php'; ?>

<nav class="navbar">
    <a href="home.php" class="navbar-brand">
        <img src="assets/img/logo.png" alt="Logo Klinik" class="logo-img">
        Klinik Kelompok 6
    </a>
    <div class="nav-buttons">
        <a href="home.php" class="btn btn-home">Home</a>
        <a href="registrasi.php" class="btn btn-register">Registrasi</a>
    </div>
</nav>

<div class="auth-container">
    <div class="auth-card">
        
        <h2 class="auth-title">Login</h2>
        
        <form action="proses_login.php" method="POST">
            
            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-submit">Masuk</button>

            <p style="text-align: center; margin-top: 25px; color: #555; font-size: 0.95rem;">
                Belum punya akun? 
                <a href="registrasi.php" style="color: #4e73df; text-decoration: none; font-weight: bold;">Registrasi</a>
            </p>

        </form>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>