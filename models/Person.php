<?php
namespace Models;

use Config\Database;

abstract class Person implements CrudInterface {
    // Encapsulation: Properti ini hanya bisa diakses oleh kelas ini dan turunannya
    protected $db;

    // Constructor wajib
    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Method abstrak wajib untuk syarat Polymorphism di kelas turunan
    abstract public function getRoleInfo();
}