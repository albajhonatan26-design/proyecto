<?php
// modelo/Cliente.php
require_once 'conexion.php';

class Cliente {
    private $conexion;

    public function __construct() {
        $objConexion = new conexion();
        $this->conexion = $objConexion->conectar();
    }

    public function obtenerTodos() {
        $sql = "SELECT IdCliente, NombreEmpresa, Correo, Telefono 
                FROM Cliente 
                ORDER BY NombreEmpresa ASC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>