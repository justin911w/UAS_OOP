<?php 
$active_page = 'pasien'; 
require_once 'views/layouts/header.php'; 

$pasienModel = new \Models\Pasien();
$daftarPasien = $pasienModel->read();
?>

<div class="admin-container">
    <?php require_once 'views/layouts/sidebar_admin.php'; ?>

    <div class="admin-content">
        <h1>Kelola Pasien</h1>
        <p>Data Master Pasien Klinik Kelompok 6</p>

        <div class="table-container">
            <a href="#" class="btn-add">+ Tambah Pasien</a>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarPasien)): ?>
                        <tr><td colspan="5" style="text-align:center;">Tidak ada data pasien.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($daftarPasien as $p): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($p['nama'] ?? '-'); ?></td>
                                <td><?= htmlspecialchars($p['no_hp'] ?? '-'); ?></td>
                                <td>
                                    <a href="#" class="btn-action btn-edit">Edit</a>
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