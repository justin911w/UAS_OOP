<?php
namespace Models;

use PDO;

class Periksa implements CrudInterface {
    private $db;

    public function __construct() {
        $this->db = \Config\Database::getConnection();
    }

    public function create($data) {
        // Implementasi tambah data periksa
    }

   public function read() {
        // Melakukan JOIN untuk menampilkan data antrean dari pasien, dokter, dan poli
        $query = "SELECT periksa.*, pasien.nama as nama_pasien, dokter.nama as nama_dokter, poli.nama_poli
                  FROM periksa
                  LEFT JOIN pasien ON periksa.id_pasien = pasien.id
                  LEFT JOIN dokter ON periksa.id_dokter = dokter.id
                  LEFT JOIN poli ON dokter.id_poli = poli.id"; 
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        // Implementasi edit data periksa
    }

    public function delete($id) {
        // Implementasi hapus data periksa
    }
}