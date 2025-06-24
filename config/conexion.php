<?php

class BD_PDO {
    private $con;

    public function __construct() {
        $host = "caboose.proxy.rlwy.net";
        $port = 53956;
        $usr  = "root";
        $pwd  = "rUiNQxWUAAfGKqMaBKgvqzHEaYtuzSnO";
        $db   = "railway";

        try {
            $this->con = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $usr, $pwd);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("❌ Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    public function Ejecutar_Instruccion($sql) {
        try {
            $stmt = $this->con->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
}

?>
