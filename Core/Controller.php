<?php
/**
 * Controller - Clase base para todos los controladores
 * Todos los controladores extienden esta clase para
 * heredar el método view().
 */
    class Controller {
    /**
     * Carga un archivo de vista y le pasa variables
     * 
     * @param string $view  Ruta de la vista (ej: 'users/index')
     * @param array  $data  Variables a pasar a la vista
     * protected: accesible en esta clase y en las clases hijas
     */
        protected function view($view, $data = []){
            // Convierte el array en variables individuales
            // ['users' => $users] → $users disponible en la vista
            extract($data);
            
            // Carga el archivo de vista usando ruta absoluta
            require_once __DIR__ . "/../App/Views/{$view}.php";
        }
    }
?>