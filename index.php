<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGER - Sistema de Gestión de Requerimientos</title>
    <link rel="stylesheet" href="./CSS/style.css">
    
    <!-- Estilos integrados para la nueva sección -->
    <style>
        /* Estilos para la sección de accesos */
        .accesos {
            padding: 60px 20px;
            background-color: #f8f9fa;
            text-align: center;
        }

        .accesos h2 {
            color: #1e3c72;
            margin-bottom: 10px;
            font-size: 32px;
        }

        .accesos .subtitulo {
            color: #666;
            margin-bottom: 40px;
            font-size: 16px;
        }

        .accesos-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 0 auto;
        }

        .acceso-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 250px;
            border-top: 4px solid #1e3c72;
        }

        .acceso-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            border-top-color: #4CAF50;
        }

        .acceso-card .icono {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .acceso-card h3 {
            color: #1e3c72;
            margin-bottom: 10px;
        }

        .acceso-card p {
            color: #666;
            font-size: 14px;
        }

        /* Ajustes para el logo en el navbar */
        .navbar .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #1e3c72;
            font-weight: bold;
            font-size: 24px;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar">
        <a href="index.php" class="logo">
            <img src="./IMG/logo.png" alt="SIGER Logo">
            SIGER
        </a>
        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Sistema de Gestión de Requerimientos</h1>
                <p>Optimiza el registro, seguimiento y control de requerimientos de tu empresa con nuestra plataforma web.</p>
                <a href="vista/login.php" class="btn-iniciar">Iniciar sesión</a>
            </div>
            <div class="hero-image">
                <img src="./IMG/imgcompu.png" alt="Sistema de gestión" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </section>

    <!-- 🆕 Nueva Sección: Accesos al Sistema -->
    <section class="accesos">
        <h2>Accesos al Sistema</h2>
        <p class="subtitulo">Selecciona la opción que necesites</p>
        
        <div class="accesos-grid">
           

            <!-- Opción 2: Registro de Usuario (Tabla Independiente 1) -->
            <a href="vista/registro_usuario.php" class="acceso-card">
                <div class="icono">👤</div>
                <h3>Registrar Usuario</h3>
                <p>Crea una cuenta para acceder al sistema</p>
            </a>

            <!-- Opción 3: Registro de Cliente (Tabla Independiente 2) -->
            <a href="vista/registro_cliente.php" class="acceso-card">
                <div class="icono">🏢</div>
                <h3>Registrar Cliente</h3>
                <p>Registra una nueva empresa o cliente</p>
            </a>
        </div>
    </section>

    <!-- Sección de características -->
    <section class="features" id="servicios">
        <h2>Solución de Gestión de Requerimientos</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>📝 Registro</h3>
                <p>Registra todos los requerimientos de tu empresa de forma organizada y eficiente.</p>
            </div>
            <div class="feature-card">
                <h3>📊 Seguimiento</h3>
                <p>Haz seguimiento al estado de cada requerimiento en tiempo real.</p>
            </div>
            <div class="feature-card">
                <h3>📈 Informes</h3>
                <p>Genera informes detallados para la toma de decisiones.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto">
        <p>&copy; 2026 SIGER - Sistema de Gestión de Requerimientos. Todos los derechos reservados.</p>
    </footer>

</body>
</html>