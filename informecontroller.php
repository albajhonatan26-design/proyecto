<?php
// controlador/InformeController.php
session_start();

// Validar que haya sesión iniciada
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../vista/login.php');
    exit();
}

// Verificar qué informe nos piden
$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

if ($accion === 'clientes') {
    require_once '../modelo/cliente.php';
    $modeloCliente = new Cliente();
    $clientes = $modeloCliente->obtenerTodos();
    require_once '../vista/informes/clientes.php';
    
} elseif ($accion === 'requerimientos') {
    require_once '../modelo/requerimientos.php';  // ✅ minúsculas
    $modeloReq = new Requerimiento();
    $requerimientos = $modeloReq->obtenerTodos();
    require_once '../vista/informes/requerimientos.php';
    
} elseif ($accion === 'informe_join_cliente') {
    require_once '../modelo/requerimientos.php';  // ✅ minúsculas
    $modeloReq = new Requerimiento();
    $datosInforme = $modeloReq->obtenerConCliente();
    require_once '../vista/informes/requerimientos_con_cliente.php';
    
} elseif ($accion === 'informe_filtro_prioridad') {
    require_once '../modelo/requerimientos.php';  // ✅ minúsculas
    $modeloReq = new Requerimiento();
    
    $prioridadSeleccionada = $_GET['prioridad'] ?? '';
    $datosFiltrados = [];
    
    if ($prioridadSeleccionada !== '') {
        $datosFiltrados = $modeloReq->obtenerPorPrioridad($prioridadSeleccionada);
    }
    
    require_once '../vista/informes/requerimientos_por_prioridad.php';
    
} elseif ($accion === 'informe_filtro_fecha') {
    require_once '../modelo/requerimientos.php';  // ✅ minúsculas
    $modeloReq = new Requerimiento();


    
    $fechaInicio = $_GET['fecha_inicio'] ?? '';
    $fechaFin = $_GET['fecha_fin'] ?? '';
    $datosFiltrados = [];
    
    if ($fechaInicio !== '' && $fechaFin !== '') {
        $datosFiltrados = $modeloReq->obtenerPorFecha($fechaInicio, $fechaFin);
    }
    
    require_once '../vista/informes/requerimientos_por_fecha.php';
    
} else {
    echo "Informe no encontrado";
}
?>