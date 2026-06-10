<?php
// modelo/conexion.php
class conexion {
    private $host = 'localhost';
    private $db   = 'siger';
    private $user = 'root';
    private $pass = ''; // Pon tu contraseña de MySQL si tienes una, si no, déjalo vacío
    private $charset = 'utf8mb4';
    private $pdo;

    public function conectar() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            if ($this->pdo === null) {
                $this->pdo = new PDO($dsn, $this->user, $this->pass, $opciones);
            }
            return $this->pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>