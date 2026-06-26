<?php
namespace Models;

use PDO;

class Dokter extends Person {
    // Method Overriding (Polymorphism)
    public function getRoleInfo() {
        return "Role: Dokter Klinik";
    }

    public function create($data) { /* Implementasi tambah data (nanti kita buat) */ }
    
    public function read() {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE role = 'dokter'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $data) { /* Implementasi edit data */ }
    public function delete($id) { /* Implementasi hapus data */ }
}