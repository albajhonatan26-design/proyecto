<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - SIGER</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-icon">🔐</div>
        <h2>Bienvenido a SIGER</h2>
        <p class="subtitle">Sistema de Gestión de Requerimientos</p>
        
        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="error-message">
                <?php 
                echo $_SESSION['error_login']; 
                unset($_SESSION['error_login']);
                ?>
            </div>
        <?php endif; ?>

        <form action="../controlador/logincontroller.php" method="POST">
            <div class="form-group">
                <label for="correo">📧 Correo electrónico</label>
                <input type="email" id="correo" name="correo" required placeholder="ejemplo@empresa.com">
            </div>
            
            <div class="form-group">
                <label for="contrasena">🔑 Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required placeholder="Ingresa tu contraseña">
            </div>
            
            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>
        
        <div class="login-footer">
            <p>&copy; 2026 SIGER - Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>