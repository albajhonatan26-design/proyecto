<?php
// modelo/usuario.php
require_once 'conexion.php';

class usuario {
    private $conexion;

    public function __construct() {
        $objConexion = new conexion();
        $this->conexion = $objConexion->conectar();
    }

    public function verificarCredenciales($correo, $contrasenaPlana) {
        $sql = "SELECT IdUsuario, Nombre, Apellido, Correo, Contrasena, Rol 
                FROM Usuario 
                WHERE Correo = :correo";
                
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        
        $usuario = $stmt->fetch();

        // Comparación directa de texto plano
        if ($usuario && $contrasenaPlana === $usuario['Contrasena']) {
            return $usuario;
        }
        
        return false;
    }
}
?>