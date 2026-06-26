<?php
session_start();

require_once 'config/Database.php';
require_once 'models/CrudInterface.php';
require_once 'models/Person.php';
require_once 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new \Models\User();
    $loggedInUser = $userModel->login($email, $password);

    if ($loggedInUser) {
        // Set session user
        $_SESSION['user_id'] = $loggedInUser['id'];
        $_SESSION['user_nama'] = $loggedInUser['nama'];
        $_SESSION['user_role'] = $loggedInUser['role'];

        // Arahkan berdasarkan role
        if ($loggedInUser['role'] == 'admin') {
            header("Location: dashboard.php");
        } else if ($loggedInUser['role'] == 'pasien') {
            header("Location: profil_pasien.php");
        } else {
            header("Location: profil_dokter.php");
        }
        exit;
    } else {
        echo "<script>alert('Email atau Password salah!'); window.location.href='login.php';</script>";
    }
}