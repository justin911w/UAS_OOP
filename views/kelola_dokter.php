<?php 
$active_page = 'dokter'; 
require_once 'views/layouts/header.php'; 

$dokterModel = new \Models\Dokter();
$daftarDokter = $dokterModel->read();
?>

<div class="admin-container">
    <?php require_once 'views/layouts/sidebar_admin.php'; ?>

    <div class="admin-content">
        <h1>Kelola Dokter</h1>
        <p>Data Master Dokter Klinik Kelompok 6</p>

        <div class="table-container">
            <a href="#" class="btn-add">+ Tambah Dokter</a>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($daftarDokter as $doc): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($doc['nama']); ?></td>
                            <td><?= htmlspecialchars($doc['spesialisasi']); ?></td>
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