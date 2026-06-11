<?php
/**
 * nacionalidadController - Controlador para la gestión de nacionalidades
 * Maneja las peticiones relacionadas con países/nacionalidades
 */
Class nacionalidadController extends Controller{
    /** @var nacionalidad $nacionalidadModel Instancia del modelo nacionalidad */
    private $nacionalidadModel;

    /** @var Departamento $departamentoModel Instancia del modelo Departamento */
    private $departamentoModel;

    /** @var Ciudad $ciudadModel Instancia del modelo Ciudad */
    private $ciudadModel;

    /**
     * Constructor - Inicializa el modelo de nacionalidades, departamentos y ciudades
     */
    public function __construct(){
        $this -> nacionalidadModel = new nacionalidad();
        $this -> departamentoModel = new Departamento();
        $this -> ciudadModel       = new Ciudad();
    }

    /**
     * Muestra la lista de todas las nacionalidades, departamento y ciudades
     */
    public function index(){
        $pais = $this -> nacionalidadModel -> getAll();
        $departamentos = $this->departamentoModel->getAll();
        $ciudades      = $this->ciudadModel->getAll();
        $this -> view('nacionalidad/index', [
            'pais' => $pais,
            'departamentos' => $departamentos,
            'ciudades'      => $ciudades
        ]);
    }


    /**
     * Muestra el formulario y procesa la creación de nacionalidad
     */
    public function create_nacionalidad(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this -> nacionalidadModel -> create_nacionalidad($_POST);
            header('location:'. BASE_URL . '?controller=nacionalidad&action=index');
        }else{
            $this -> view('create_nacionalidad');
        }
    }

    /**
     * Muestra el formulario y procesa la edición de nacionalidad
     * @param int $_GET['pais_id'] ID del país a editar
     */
    public function edit_nacionalidad(){
        $pais_id = $_GET['pais_id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this -> nacionalidadModel -> update_nacionalidad($pais_id, $_POST);
            header('Location:' . BASE_URL. '?controller=nacionalidad&action=index');
        }else{
            $pais = $this -> nacionalidadModel -> getById($pais_id);
            $this->view('edit_nacionalidad',['pais' => $pais]);
        }
    }

    /**
     * Elimina una nacionalidad y redirige al listado
     * @param int $_GET['pais_id'] ID del país a eliminar
     */
    public function delete_nacionalidad(){
        $pais_id = $_GET['pais_id'];
        $this -> nacionalidadModel -> delete_nacionalidad($pais_id);
        header('Location:'. BASE_URL. "?controller=nacionalidad&action=index");
    }

}
?>