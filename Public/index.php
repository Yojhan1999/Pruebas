<?php
require_once "../Core/Autoloader.php";

$controller = $_GET['controller'] ?? 'user';
$action     = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . 'Controller';

if(class_exists($controllerName)){
    $controllerInstance = new $controllerInstance();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    }else{
        die("Accion . $action no encontrada");
    }
}else{
    die("Controlador . $controllerName no encontrado"); 
}