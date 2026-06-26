<?php
namespace Models;

use PDO;

class Pasien extends Person {
    
    // Method Overriding (Polymorphism)
    public function getRoleInfo() {
        return "Role: Pasien Klinik";
    }

    public function create($data) { 
        // Implementasi tambah data 
    }
    
    public function read() {
        // Mengambil data langsung dari tabel users sesuai struktur asli Anda
        $stmt = $this->db->prepare("SELECT * FROM users WHERE role = 'pasien'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $data) { 
        // Implementasi edit data
    }
    
    public function delete($id) { 
        // Implementasi hapus data
    }
}