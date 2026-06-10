<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Requerimientos - SIGER</title>
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <style>
        .informe-container {
            padding: 40px;
            background-color: #f4f6f9;
            min-height: 100vh;
        }
        
        .informe-header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .informe-header h1 {
            color: #1e3c72;
            margin: 0;
        }
        
        .informe-header p {
            color: #666;
            margin: 5px 0 0 0;
        }
        
        .btn-imprimir {
            padding: 10px 25px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-imprimir:hover {
            background-color: #45a049;
        }
        
        .btn-volver {
            padding: 10px 25px;
            background-color: #1e3c72;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-left: 10px;
        }
        
        .btn-volver:hover {
            background-color: #2a5298;
        }
        
        table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-collapse: collapse;
        }
        
        table thead {
            background-color: #1e3c72;
            color: white;
        }
        
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1;
        }
        
        table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        /* Badges de Prioridad con colores */
        .estado-badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            color: white;
            display: inline-block;
        }
        
        .estado-alta {
            background-color: #f44336; /* Rojo */
        }
        
        .estado-media {
            background-color: #FF9800; /* Naranja */
        }
        
        .estado-baja {
            background-color: #4CAF50; /* Verde */
        }
        
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="informe-container">
        <div class="informe-header">
            <div>
                <h1>📝 Informe de Requerimientos</h1>
                <p>Listado general de requerimientos del sistema</p>
            </div>
            <div class="no-print">
                <button onclick="window.print()" class="btn-imprimir">🖨️ Imprimir</button>
              <a href="http://localhost/Proyecto/perfil.php" class="btn-volver">← Volver</a>
            </div>
        </div>
            
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Archivo Adjunto</th>
                    <th>Prioridad</th>
                    <th>Fecha Creación</th>
                    <th>Medio Recepción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($requerimientos) > 0): ?>
                    <?php foreach ($requerimientos as $req): ?>
                        <tr>
                            <!-- Buscamos mayúscula, si no, buscamos minúscula -->
                            <td><?php echo htmlspecialchars($req['IdRequerimiento'] ?? $req['idrequerimiento'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($req['Descripcion'] ?? $req['descripcion'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($req['ArchivoAdjunto'] ?? $req['archivoadjunto'] ?? ''); ?></td>
                            <td>
                                <?php 
                                // Buscamos Prioridad en mayúscula o minúscula
                                $prioridad = $req['Prioridad'] ?? $req['prioridad'] ?? '';
                                $clasePrioridad = strtolower($prioridad);
                                ?>
                                <span class="estado-badge estado-<?php echo htmlspecialchars($clasePrioridad); ?>">
                                    <?php echo htmlspecialchars($prioridad); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($req['FechaCreacion'] ?? $req['fechacreacion'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($req['MedioRecepcion'] ?? $req['mediorecepcion'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 30px;">
                            No hay requerimientos registrados
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>