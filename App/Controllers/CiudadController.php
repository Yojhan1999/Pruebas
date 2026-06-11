<?php
/**
 * CiudadController - Controlador para la gestión de ciudades
 * Maneja las peticiones relacionadas con ciudades
 */
class CiudadController extends Controller {
    /** @var Ciudad       $ciudadModel       Instancia del modelo Ciudad */
    private $ciudadModel;

    /** @var Departamento $departamentoModel Instancia del modelo Departamento */
    private $departamentoModel;


    /**
     * Constructor - Inicializa los modelos necesarios
     * Necesita Departamento para el select en los formularios
     */
    public function __construct() {
        $this->ciudadModel      = new Ciudad();
        $this->departamentoModel = new Departamento();
    }

    /**
     * Muestra la lista de todas las ciudades
     */
    public function index() {
        $ciudades = $this->ciudadModel->getAll();
        $this->view('ciudad/index', ['ciudades' => $ciudades]);
    }

    /**
     * Muestra el formulario y procesa la creación de ciudad
     * Envía $departamentos a la vista para el select
     */
    public function create() {
        $departamentos = $this->departamentoModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->ciudadModel->create($_POST);
            header('Location: ' . BASE_URL . '?controller=ciudad&action=index');
        } else {
            $this->view('ciudad/create', ['departamentos' => $departamentos]);
        }
    }

    /**
     * Muestra el formulario y procesa la edición de ciudad
     * @param int $_GET['ciudad_id'] ID de la ciudad a editar
     */
    public function edit() {
        $ciudad_id     = $_GET['ciudad_id'];
        $departamentos = $this->departamentoModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->ciudadModel->update($ciudad_id, $_POST);
            header('Location: ' . BASE_URL . '?controller=ciudad&action=index');
        } else {
            $ciudad = $this->ciudadModel->getById($ciudad_id);
            $this->view('ciudad/edit', [
                'ciudad'        => $ciudad,
                'departamentos' => $departamentos
            ]);
        }
    }

    /**
     * Elimina una ciudad y redirige al listado
     * @param int $_GET['ciudad_id'] ID de la ciudad a eliminar
     */
    public function delete() {
        $ciudad_id = $_GET['ciudad_id'];
        $this->ciudadModel->delete($ciudad_id);
        header('Location: ' . BASE_URL . '?controller=ciudad&action=index');
    }
}