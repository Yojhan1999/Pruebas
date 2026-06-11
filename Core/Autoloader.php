<?php
/**
 * Autoloader - Cargador automático de clases
 * Evita escribir require_once manualmente en cada archivo.
 * PHP lo llama automáticamente cuando se usa una clase que no está cargada.
 */
    spl_autoload_register(function ($class){
        // Carpetas donde buscar las clases
        $paths = ["Core", "App/Controllers", "App/Models"];
        foreach ($paths as $path) {
            // Construye la ruta absoluta: /ruta/del/proyecto/Core/NombreClase.php
            $file = __DIR__."/../".$path."/".$class.".php";
            
            // Si el archivo existe, lo carga y detiene la búsqueda
            if (file_exists($file)){
                require_once $file;
                return;
            }

        }
    });
?>