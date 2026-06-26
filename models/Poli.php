<?php
namespace Models;

use PDO;

class Poli implements CrudInterface {
    private $db;

    public function __construct() {
        $this->db = \Config\Database::getConnection();
    }

    public function create($data) {}

    public function read() {
        $stmt = $this->db->prepare("SELECT * FROM poli");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {}
    public function delete($id) {}
}