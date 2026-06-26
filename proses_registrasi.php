<?php
session_start();

require_once 'config/Database.php';
require_once 'models/CrudInterface.php';
require_once 'models/Person.php';
require_once 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userModel = new \Models\User();
    
    // Tangkap data dari form dan hash password
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'nohp' => $_POST['nohp'],
        'role' => 'pasien' // Pendaftar dari luar otomatis menjadi pasien
    ];

    if ($userModel->create($data)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal. Email mungkin sudah digunakan.'); window.location.href='registrasi.php';</script>";
    }
}