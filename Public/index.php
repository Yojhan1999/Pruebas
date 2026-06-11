<?php
/**
 * Punto de entrada único de la aplicación
 * Todas las peticiones pasan por aquí gracias al .htaccess
 */

// Define la URL base del proyecto para los redirects
define('BASE_URL', '/prueba/Public/');

// Carga el autoloader para que las clases estén disponibles
require_once "../Core/Autoloader.php";

// Obtiene el controlador y acción de la URL
// Si no se especifica, usa 'user' e 'index' por defecto
$controller = $_GET['controller'] ?? 'user';
$action     = $_GET['action'] ?? 'index';

// Construye el nombre de la clase controlador
// ej: 'user' → 'UserController'
$controllerName = ucfirst($controller) . 'Controller';

// Verifica si la clase existe (el autoloader la habrá cargado)
if(class_exists($controllerName)){
    // Instancia el controlador
    $controllerInstance = new $controllerName();

    // Verifica si el método (acción) existe en el controlador
    if (method_exists($controllerInstance, $action)) {
        // Ejecuta el método
        $controllerInstance->$action();
    }else{
        die("Accion . $action no encontrada");
    }
}else{
    die("Controlador . $controllerName no encontrado"); 
}