<?php
    // Cargar clases
    require_once('../app/controllers/TareaController.php');
    require_once('../app/models/RepositorioTareas.php');
    
    session_start();
    // Crear instancias de las clases necesarias
    $session = $_SESSION;
    $repositorio = new RepositorioTareas($session);
    $tareaController = new TareaController($repositorio);
    // Manejar las acciones
    $tareaController->manejarAccion();
?>