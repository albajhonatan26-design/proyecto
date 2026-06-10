<?php
// modelo/requerimientos.php
require_once 'conexion.php';

class Requerimiento {
    private $conexion;

    public function __construct() {
        $objConexion = new conexion();
        $this->conexion = $objConexion->conectar();
    }

    // Informe 2: Listado simple de requerimientos (1 tabla)
    public function obtenerTodos() {
        $sql = "SELECT IdRequerimiento, Descripcion, ArchivoAdjunto, Prioridad, FechaCreacion, MedioRecepcion 
                FROM Requerimiento 
                ORDER BY FechaCreacion DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Informe 3: JOIN de 2 tablas (Requerimiento + Cliente)
    public function obtenerConCliente() {
        $sql = "SELECT r.IdRequerimiento, c.NombreEmpresa, r.Descripcion, r.Prioridad, r.FechaCreacion 
                FROM Requerimiento r
                INNER JOIN Cliente c ON r.IdCliente = c.IdCliente
                ORDER BY r.FechaCreacion DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Informe 4: JOIN + Parámetro (filtro por Prioridad)
    public function obtenerPorPrioridad($prioridad) {
        $sql = "SELECT r.IdRequerimiento, c.NombreEmpresa, r.Descripcion, r.Prioridad, r.FechaCreacion 
                FROM Requerimiento r
                INNER JOIN Cliente c ON r.IdCliente = c.IdCliente
                WHERE r.Prioridad = :prioridad
                ORDER BY r.FechaCreacion DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':prioridad', $prioridad);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Informe 5: JOIN + Parámetro (filtro por Fecha)
    public function obtenerPorFecha($fechaInicio, $fechaFin) {
        $sql = "SELECT r.IdRequerimiento, c.NombreEmpresa, r.Descripcion, r.Prioridad, r.FechaCreacion 
                FROM Requerimiento r
                INNER JOIN Cliente c ON r.IdCliente = c.IdCliente
                WHERE r.FechaCreacion BETWEEN :fecha_inicio AND :fecha_fin
                ORDER BY r.FechaCreacion DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':fecha_inicio', $fechaInicio);
        $stmt->bindParam(':fecha_fin', $fechaFin);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>