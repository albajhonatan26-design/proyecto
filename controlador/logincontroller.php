<?php
// controlador/logincontroller.php
session_start();

// Si no es una petición POST, redirigimos al formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../vista/login.php');
    exit();
}

require_once '../modelo/usuario.php';

$correo = trim($_POST['correo']);
$contrasena = trim($_POST['contrasena']);

$usuarioModelo = new usuario();
$usuarioValido = $usuarioModelo->verificarCredenciales($correo, $contrasena);

if ($usuarioValido) {
    // Credenciales correctas: Guardamos en sesión
    $_SESSION['id_usuario'] = $usuarioValido['IdUsuario'];
    $_SESSION['nombre']     = $usuarioValido['Nombre'] . ' ' . $usuarioValido['Apellido'];
    $_SESSION['rol']        = $usuarioValido['Rol'];

    // Redirigimos al panel principal
    header('Location: ../perfil.php');
    exit(); // ⚠️ Crucial: detiene la ejecución después del header
} else {
    // Credenciales incorrectas
    $_SESSION['error_login'] = 'Correo o contraseña incorrectos.';
    header('Location: ../vista/login.php');
    exit();
}
?>
<?php
session_start();
echo "El controlador se está ejecutando<br>"; // Línea de prueba
die("Detenido aquí"); // Detener para ver si llega