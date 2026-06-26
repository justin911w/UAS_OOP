<?php 
$active_page = 'poli'; 
require_once 'views/layouts/header.php'; 

$poliModel = new \Models\Poli();
$daftarPoli = $poliModel->read();
?>

<div class="admin-container">
    <?php require_once 'views/layouts/sidebar_admin.php'; ?>

    <div class="admin-content">
        <h1>Kelola Poli</h1>
        <p>Data Master Poli Klinik Kelompok 6</p>

        <div class="table-container">
            <a href="#" class="btn-add">+ Tambah Poli</a>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Poli</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($daftarPoli as $poli): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>Poli <?= htmlspecialchars($poli['nama_poli']); ?></td>
                            <td><?= htmlspecialchars($poli['keterangan']); ?></td>
                            <td>
                                <a href="#" class="btn-action btn-edit">Edit</a>
                                <a href="#" class="btn-action btn-delete">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>