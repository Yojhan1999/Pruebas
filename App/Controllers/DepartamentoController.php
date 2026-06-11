<?php
/**
 * DepartamentoController - Controlador para la gestión de departamentos
 * Maneja las peticiones relacionadas con departamentos
 */
class DepartamentoController extends Controller{
    /** @var Departamento  $departamentoModel Instancia del modelo Departamento */
    private $departamentoModel;
    /** @var nacionalidad $nacionalidadModel  Instancia del modelo nacionalidad */
    private $nacionalidadModel;

    /**
     * Constructor - Inicializa los modelos necesarios
     * Necesita nacionalidad para el select de países en los formularios
     */
    public function __construct(){
        $this -> departamentoModel = new Departamento();
        $this -> nacionalidadModel = new nacionalidad(); 
    }

    /**
     * Muestra la lista de todos los departamentos
     */
    public function index(){
        $departamentos = $this ->departamentoModel ->getAll();
        $this->view('departamento/index',['departamentos' => $departamentos]);
    }

    /**
     * Muestra el formulario y procesa la creación de departamento
     * Envía $paises a la vista para el select de países
     */
    public function create(){
        $paises = $this->nacionalidadModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->departamentoModel->create($_POST);
            header('Location: ' . BASE_URL . '?controller=departamento&action=index');
        }else{
            $this -> view('departamento/create', ['paises' => $paises]);
        }
    }

    /**
     * Muestra el formulario y procesa la edición de departamento
     * @param int $_GET['departamento_id'] ID del departamento a editar
     */
    public function edit(){
        $departamento_id = $_GET['departamento_id'];
        $paises = $this->nacionalidadModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->departamentoModel->update($departamento_id, $_POST);
            header('Location:'. BASE_URL . '?controller=departamento&action=index');
        }else{
            $departamento = $this->departamentoModel->getByID($departamento_id);
            $this -> view('departamento/edit',[
                'departamento' => $departamento,
                'paises'       => $paises
            ]);
        }
    }

    /**
     * Elimina un departamento y sus ciudades asociadas
     * @param int $_GET['departamento_id'] ID del departamento a eliminar
     */
    public function delete(){
        $departamento_id = $_GET['departamento_id'];
        $this->departamentoModel->delete($departamento_id);
        header('Location:'.BASE_URL.'?controller=departamento&action=index');
    }
}