<?php
// Muat koneksi database
require_once 'config/Database.php';

// Ambil koneksi
$db = \Config\Database::getConnection();

// Data admin yang akan dibuat
$nama = 'Admin Klinik';
$email = 'admin@klinik.com';
$password = password_hash('admin123', PASSWORD_DEFAULT); // Enkripsi password
$nohp = '081234567890';
$role = 'admin';

// Cek apakah admin dengan email ini sudah ada
$cek = $db->prepare("SELECT id FROM users WHERE email = :email");
$cek->execute(['email' => $email]);

if ($cek->rowCount() > 0) {
    echo "<h1>Akun admin sudah ada di database!</h1>";
    echo "<p>Silakan langsung login menggunakan email: <b>admin@klinik.com</b></p>";
} else {
    // Masukkan data ke database
    $query = "INSERT INTO users (nama, email, password, no_hp, role) VALUES (:nama, :email, :password, :nohp, :role)";
    $stmt = $db->prepare($query);
    
    $sukses = $stmt->execute([
        'nama' => $nama, 
        'email' => $email, 
        'password' => $password, 
        'nohp' => $nohp, 
        'role' => $role
    ]);

    if ($sukses) {
        echo "<h1>Akun Admin berhasil dibuat!</h1>";
        echo "<p>Email: <b>admin@klinik.com</b></p>";
        echo "<p>Password: <b>admin123</b></p>";
        echo "<br><a href='login.php'>Klik di sini untuk menuju halaman Login</a>";
    } else {
        echo "<h1>Gagal membuat akun admin.</h1>";
    }
}
?>