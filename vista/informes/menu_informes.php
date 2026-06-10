<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes - SIGER</title>
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <style>
        .menu-informes {
            padding: 40px;
            background-color: #f4f6f9;
            min-height: 100vh;
        }
        
        .menu-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .menu-header h1 {
            color: #1e3c72;
            font-size: 36px;
            margin-bottom: 10px;
        }
        
        .menu-header p {
            color: #666;
            font-size: 16px;
        }
        
        .informes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .informe-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
            border: 2px solid transparent;
        }
        
        .informe-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: #4CAF50;
        }
        
        .informe-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        
        .informe-card h3 {
            color: #1e3c72;
            margin-bottom: 15px;
            font-size: 22px;
        }
        
        .informe-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .badge {
            display: inline-block;
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .badge-join {
            background-color: #2196F3;
        }
        
        .badge-param {
            background-color: #FF9800;
        }
        
        .btn-volver {
            display: inline-block;
            margin-top: 50px;
            padding: 12px 30px;
            background-color: #1e3c72;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .btn-volver:hover {
            background-color: #2a5298;
        }
    </style>
</head>
<body>
    <div class="menu-informes">
        <div class="menu-header">
            <h1>📊 Centro de Informes</h1>
            <p>Selecciona un informe para generar el reporte</p>
        </div>

        <div class="informes-grid">
            <!-- Informe 3: JOIN de 2 tablas -->
            <a href="../../controlador/InformeController.php?accion=informe_join_cliente" class="informe-card">
                <div class="informe-icon">🔗</div>
                <h3>Requerimientos por Cliente</h3>
                <p>Muestra los requerimientos con el nombre de la empresa cliente </p>
                
            </a>

            <!-- Informe 4: JOIN con parámetro (Prioridad) -->
            <a href="../../controlador/InformeController.php?accion=informe_filtro_prioridad" class="informe-card">
                <div class="informe-icon">🔍</div>
                <h3>Requerimientos por Prioridad</h3>
                <p>Filtra los requerimientos según el nivel de prioridad</p>
               
            </a>

            <!-- Informe 5: JOIN con parámetro (Fecha) -->
            <a href="../../controlador/InformeController.php?accion=informe_filtro_fecha" class="informe-card">
                <div class="informe-icon">📅</div>
                <h3>Requerimientos por Fecha</h3>
                <p>Consulta los requerimientos creados en un rango de fechas específico</p>
         
            </a>
        </div>

        <div style="text-align: center;">
            <a href="../../perfil.php" class="btn-volver">← Volver </a>
        </div>
    </div>
</body>
</html>