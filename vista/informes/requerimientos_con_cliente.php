<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe JOIN - SIGER</title>
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <style>
        .informe-container { padding: 40px; background-color: #f4f6f9; min-height: 100vh; }
        .informe-header { background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
        .informe-header h1 { color: #1e3c72; margin: 0; }
        .informe-header p { color: #666; margin: 5px 0 0 0; }
        .btn-imprimir { padding: 10px 25px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px; }
        .btn-volver { padding: 10px 25px; background-color: #1e3c72; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin-left: 10px; }
        table { width: 100%; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-collapse: collapse; }
        table thead { background-color: #1e3c72; color: white; }
        table th, table td { padding: 15px; text-align: left; border-bottom: 1px solid #e1e1e1; }
        table tbody tr:hover { background-color: #f8f9fa; }
        .estado-badge { padding: 5px 12px; border-radius: 15px; font-size: 12px; font-weight: bold; color: white; display: inline-block; }
        .estado-alta { background-color: #f44336; }
        .estado-media { background-color: #FF9800; }
        .estado-baja { background-color: #4CAF50; }
        .badge-info { display: inline-block; padding: 5px 15px; background-color: #2196F3; color: white; border-radius: 20px; font-size: 12px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="informe-container">
        <div class="informe-header">
            <div>
                <h1>🔗 Requerimientos por Cliente</h1>
               
            </div>
            <div>
                <button onclick="window.print()" class="btn-imprimir">🖨️ Imprimir</button>
                <a href="http://localhost/Proyecto/vista/informes/menu_informes.php" class="btn-volver">← Volver</a>
            </div>
        </div>

     

        <table>
            <thead>
                <tr>
                    <th>ID Req</th>
                    <th>Cliente (Empresa)</th>
                    <th>Descripción</th>
                    <th>Prioridad</th>
                    <th>Fecha Creación</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($datosInforme) > 0): ?>
                    <?php foreach ($datosInforme as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['IdRequerimiento'] ?? $row['idrequerimiento'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['NombreEmpresa'] ?? $row['nombreempresa'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($row['Descripcion'] ?? $row['descripcion'] ?? ''); ?></td>
                            <td>
                                <?php 
                                $prioridad = $row['Prioridad'] ?? $row['prioridad'] ?? '';
                                $clase = strtolower($prioridad);
                                ?>
                                <span class="estado-badge estado-<?php echo htmlspecialchars($clase); ?>">
                                    <?php echo htmlspecialchars($prioridad); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($row['FechaCreacion'] ?? $row['fechacreacion'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 30px;">No hay datos para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>