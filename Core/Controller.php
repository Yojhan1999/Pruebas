<?php

    class Controller {
        protected function view($view, $data = []){
            extract($data);
            require_once __DIR__ . "/../App/Views/{$view}.php";
        }
    }
?>