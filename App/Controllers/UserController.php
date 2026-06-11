<?php
/**
 * UserController - Controlador para la gestión de usuarios
 * Maneja las peticiones relacionadas con usuarios
 * Hereda el método view() de Controller
 */
class UserController extends Controller{
    /** @var User $userModel Instancia del modelo User */
    private $userModel;

    /**
     * Constructor - Inicializa el modelo de usuarios
     */
    public function __construct(){
        $this -> userModel =  new User();
    }

    /**
     * Muestra la lista de todos los usuarios
     */
    public function index(){
        $users = $this -> userModel -> getAll();
        $this -> view('index', ['users' => $users]);
    }

    /**
     * Muestra el formulario y procesa la creación de usuario
     * GET:  muestra el formulario vacío
     * POST: procesa los datos y redirige al listado
     */
    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->userModel->create($_POST);
            header('Location: ' . BASE_URL . '?controller=user&action=index');
        } else {
            $this->view('create');
        }
    }

    /**
     * Muestra el formulario y procesa la edición de usuario
     * GET:  muestra el formulario con datos actuales
     * POST: procesa los cambios y redirige al listado
     * @param int $_GET['id'] ID del usuario a editar
     */
    public function edit(){
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this -> userModel -> update($id, $_POST);
            header('Location: ' . BASE_URL . '?controller=user&action=index');
        } else {
            $user = $this -> userModel -> getById($id);
            $this->view('edit', ['user' => $user]);
        }
    }

    /**
     * Elimina un usuario y redirige al listado
     * @param int $_GET['id'] ID del usuario a eliminar
     */
    public function delete(){
        $id = $_GET['id'];
        $this -> userModel -> delete($id);
        header('Location: ' . BASE_URL . '?controller=user&action=index');
    }
    
}