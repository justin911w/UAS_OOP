<?php 
$active_page = 'periksa'; 
require_once 'views/layouts/header.php'; 

$periksaModel = new \Models\Periksa();
$daftarPeriksa = $periksaModel->read(); // Mengambil data periksa dari database
?>

<div class="admin-container">
    <?php require_once 'views/layouts/sidebar_admin.php'; ?>

    <div class="admin-content">
        <h1>Data Periksa</h1>
        <p>Daftar pemeriksaan medis Klinik Kelompok 6</p>

        <div class="table-container">
            <a href="#" class="btn-add">+ Tambah Data Periksa</a>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Poli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarPeriksa)): ?>
                        <tr><td colspan="6" style="text-align:center;">Tidak ada data pemeriksaan.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($daftarPeriksa as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                                <td><?= htmlspecialchars($row['nama_pasien']); ?></td>
                                <td><?= htmlspecialchars($row['nama_dokter']); ?></td>
                                <td><?= htmlspecialchars($row['nama_poli']); ?></td>
                                <td>
                                    <a href="#" class="btn-action btn-edit">Detail</a>
                                    <a href="#" class="btn-action btn-delete">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>