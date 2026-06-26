<?php
namespace Models;

use PDO;

class User extends Person {
    // Memenuhi syarat Polymorphism
    public function getRoleInfo() {
        return "Role: User System";
    }

    // Fungsi registrasi (Create Data)
    public function create($data) {
        $query = "INSERT INTO users (nama, email, password, no_hp, role) VALUES (:nama, :email, :password, :nohp, :role)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    public function read() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $data) {
        // Cek apakah user mengirimkan password baru atau tidak
        if (!empty($data['password'])) {
            // Update beserta password baru (di-hash)
            $query = "UPDATE users SET nama = :nama, email = :email, no_hp = :nohp, password = :password WHERE id = :id";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'nohp' => $data['nohp'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'id' => $id
            ]);
        } else {
            // Update tanpa mengubah password yang sudah ada
            $query = "UPDATE users SET nama = :nama, email = :email, no_hp = :nohp WHERE id = :id";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'nohp' => $data['nohp'],
                'id' => $id
            ]);
        }
    }
    
    public function delete($id) { /* Untuk nanti */ }

    // Fungsi khusus untuk verifikasi Login
    public function login($email, $password) {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // 1. Cek jika password menggunakan enkripsi MD5 (dari injeksi SQL admin)
        if ($user['password'] === md5($password)) {
            return $user;
        }
        
        // 2. Cek jika password menggunakan Bcrypt standar PHP (dari registrasi pasien)
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}