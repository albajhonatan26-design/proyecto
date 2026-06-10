<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Clientes - SIGER</title>
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .informe-header h1 {
            color: #1e3c72;
            margin: 0;
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-collapse: collapse;
        }

        table thead {
            background-color: #1e3c72;
            color: white;
        }

        table th,
        table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1;
        }

        table tbody tr:hover {
            background-color: #f8f9fa;
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
                <h1>📊 Informe de Clientes</h1>
                <p>Listado completo de clientes registrados en el sistema</p>
            </div>
            <div class="no-print">
                <button onclick="window.print()" class="btn-imprimir">🖨️ Imprimir</button>
                <!-- Usa la URL exacta de tu navegador -->
                <a href="http://localhost/Proyecto/perfil.php" class="btn-volver">← Volver</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>

                    <th>Empresa</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($clientes) > 0): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>

                            <td><?php echo htmlspecialchars($cliente['NombreEmpresa']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Correo']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Telefono']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 30px;">
                            No hay clientes registrados en el sistema
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>