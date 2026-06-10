<?php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header('Location: vista/login.php');
    exit();
}

// Verificar qué sección nos piden mostrar
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'inicio';

// Si nos piden clientes, cargamos los datos
$clientes = [];
if ($seccion === 'clientes') {
    require_once 'modelo/Cliente.php';
    $modeloCliente = new Cliente();
    $clientes = $modeloCliente->obtenerTodos();
}

// 👇 PASO 2A: Datos para el Informe con JOIN 👇
$datosInforme = [];
if ($seccion === 'informe_requerimientos') {
    require_once 'modelo/Requerimiento.php';
    $modeloReq = new Requerimiento();
    $datosInforme = $modeloReq->obtenerConCliente();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal - SIGER</title>
    <link rel="stylesheet" href="CSS/estilos.css">
    <style>
        /* Estilos específicos del dashboard */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #1a1a2e;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #4CAF50;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #4CAF50;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 40px;
            background-color: #f4f6f9;
        }

        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .welcome-card h1 {
            color: #1e3c72;
            margin-bottom: 10px;
        }

        .role-badge {
            display: inline-block;
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 20px;
            font-size: 14px;
            margin-top: 10px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #333;
            transition: transform 0.3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }

        .menu-card h3 {
            color: #1e3c72;
            margin: 15px 0 10px;
        }

        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 30px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <h2>SIGER</h2>
            <ul>
                <li><a href="./perfil.php">📊 Panel Principal</a></li>
                <li><a href="controlador/InformeController.php?accion=clientes">👥 Clientes</a></li>
                <li><a href="vista/informes/menu_informes.php?accion=menu"> 📈 Informes</a></li>                   
                <li><a href="controlador/InformeController.php?accion=requerimientos">📝 Requerimientos</a></li>
            </ul>
        </aside>

        <?php if ($_SESSION['rol'] === 'Administrador'): ?>
            <li><a href="#">👤 Usuarios</a></li>
        <?php endif; ?>
        </ul>
        </aside>

        <!-- Contenido principal -->
        <main class="main-content">
            <div class="welcome-card">
                <h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>
                <p>Has iniciado sesión correctamente en el sistema SIGER.</p>
                <span class="role-badge"><?php echo htmlspecialchars($_SESSION['rol']); ?></span>
            </div>

            <h2 style="margin-bottom: 20px; color: #333;">Menú Rápido</h2>
            <div class="menu-grid">
                <a href="controlador/InformeController.php?accion=clientes" class="menu-card">
                    <h3>👥 Ver Clientes</h3>
                    <p>Consultar listado de clientes registrados</p>
                </a>

                <a href="#" class="menu-card">
                    <h3>📝 Nuevo Requerimiento</h3>
                    <p>Registrar un nuevo requerimiento</p>
                </a>

                <a href="vista/informes/menu_informes.php" class="menu-card">
                    <h3>📈 Informes</h3>
                    <p>Generar reportes del sistema</p>
                </a>

                <?php if ($_SESSION['rol'] === 'Administrador'): ?>
                    <a href="#" class="menu-card">
                        <h3>👤 Gestionar Usuarios</h3>
                        <p>Administrar usuarios del sistema</p>
                    </a>
                <?php endif; ?>
            </div>

            <a href="./index.php" class="logout-btn">Cerrar Sesión</a>
        </main>
    </div>
</body>

</html>