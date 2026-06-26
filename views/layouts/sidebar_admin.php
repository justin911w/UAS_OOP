<div class="sidebar">
    <h3 style="margin-bottom: 20px; text-align: center;">Admin Panel</h3>
    
    <a href="dashboard.php?page=dashboard" class="<?php echo ($active_page == 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
    <a href="dashboard.php?page=poli" class="<?php echo ($active_page == 'poli') ? 'active' : ''; ?>">Kelola Poli</a>
    <a href="dashboard.php?page=dokter" class="<?php echo ($active_page == 'dokter') ? 'active' : ''; ?>">Kelola Dokter</a>
    <a href="dashboard.php?page=pasien" class="<?php echo ($active_page == 'pasien') ? 'active' : ''; ?>">Kelola Pasien</a>
    <a href="dashboard.php?page=periksa" class="<?php echo ($active_page == 'periksa') ? 'active' : ''; ?>">Data Periksa</a>
    
    <hr style="border: 0; border-top: 1px solid #34495e; margin: 20px 0;">
    <a href="home.php" style="color: #e74c3c;">Logout</a>
</div>