<?php
class CiudadController extends Controller {
    private $ciudadModel;
    private $departamentoModel;

    public function __construct() {
        $this->ciudadModel      = new Ciudad();
        $this->departamentoModel = new Departamento();
    }
    public function index() {
        $ciudades = $this->ciudadModel->getAll();
        $this->view('ciudad/index', ['ciudades' => $ciudades]);
    }
    public function create() {
        $departamentos = $this->departamentoModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->ciudadModel->create($_POST);
            header('Location: ' . BASE_URL . '?controller=ciudad&action=index');
        } else {
            $this->view('ciudad/create', ['departamentos' => $departamentos]);
        }
    }
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
    public function delete() {
        $ciudad_id = $_GET['ciudad_id'];
        $this->ciudadModel->delete($ciudad_id);
        header('Location: ' . BASE_URL . '?controller=ciudad&action=index');
    }
}