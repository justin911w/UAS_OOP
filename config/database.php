<?php
namespace Config;

use PDO;
use PDOException;

class Database {
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "klinik_uas"; 
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$database,
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi database gagal: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}