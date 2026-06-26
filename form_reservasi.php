<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'pasien') {
    header("Location: login.php");
    exit;
}

require_once 'config/database.php';
$db = \Config\Database::getConnection();

// Ambil data dokter beserta nama polinya
$stmt = $db->prepare("SELECT d.*, p.nama_poli FROM dokter d LEFT JOIN poli p ON d.id_poli = p.id");
$stmt->execute();
$list_dokter = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<div class="auth-container">
    <div class="auth-card" style="max-width: 600px;">
        <h2 class="auth-title" style="text-align: center;">Buat Reservasi</h2>
        
        <form action="proses_reservasi.php" method="POST">
            
            <div class="input-group" style="margin-bottom: 20px;">
                <select name="id_dokter" id="id_dokter" style="width: 100%; padding: 16px 20px; border-radius: 50px; border: none; background-color: #dbdbdb; font-size: 1.05rem; color: #333; font-weight: bold; box-shadow: 0 6px 10px rgba(0,0,0,0.15); outline: none; cursor: pointer;" required>
                    <option value="">-- Pilih Dokter & Poli --</option>
                    <?php foreach($list_dokter as $doc): ?>
                        <option value="<?= $doc['id']; ?>">
                            <?= htmlspecialchars($doc['nama']); ?> (Poli <?= htmlspecialchars($doc['nama_poli']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
                <input type="date" name="tanggal" id="tanggal" min="<?= date('Y-m-d'); ?>" style="padding-left: 20px; cursor: pointer;" required>
            </div>

            <div class="input-group" style="margin-bottom: 30px;">
                <select name="jam_mulai" id="jam_mulai" style="width: 100%; padding: 16px 20px; border-radius: 50px; border: none; background-color: #dbdbdb; font-size: 1.05rem; color: #333; font-weight: bold; box-shadow: 0 6px 10px rgba(0,0,0,0.15); outline: none; cursor: pointer;" required disabled>
                    <option value="">-- Pilih Dokter dan Tanggal Terlebih Dahulu --</option>
                </select>
            </div>

            <button type="submit" class="btn btn-submit">Selesai & Buat Reservasi</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#id_dokter, #tanggal').change(function() {
        var id_dokter = $('#id_dokter').val();
        var tanggal = $('#tanggal').val();

        if(id_dokter && tanggal) {
            $('#jam_mulai').html('<option value="">Memuat jam tersedia...</option>').attr('disabled', true);
            
            $.ajax({
                url: 'ambil_slot_jam.php',
                type: 'GET',
                data: { id_dokter: id_dokter, tanggal: tanggal },
                dataType: 'json',
                success: function(response) {
                    if(response.status === 'success') {
                        var options = '<option value="">-- Pilih Jam Periksa --</option>';
                        $.each(response.data, function(index, value) {
                            options += '<option value="'+value+'">'+value+'</option>';
                        });
                        $('#jam_mulai').html(options).attr('disabled', false);
                    } else {
                        $('#jam_mulai').html('<option value="">'+response.message+'</option>').attr('disabled', true);
                    }
                },
                error: function() {
                    $('#jam_mulai').html('<option value="">Terjadi kesalahan sistem.</option>').attr('disabled', true);
                }
            });
        } else {
            $('#jam_mulai').html('<option value="">-- Pilih Dokter dan Tanggal Terlebih Dahulu --</option>').attr('disabled', true);
        }
    });
});
</script>

<?php require_once 'views/layouts/footer.php'; ?>