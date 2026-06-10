<?php
Class nacionalidadController extends Controller{
    private $nacionalidadModel;
    private $departamentoModel;
    private $ciudadModel;
    public function __construct(){
        $this -> nacionalidadModel = new nacionalidad();
        $this -> departamentoModel = new Departamento();
        $this -> ciudadModel       = new Ciudad();
    }
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
    public function create_nacionalidad(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this -> nacionalidadModel -> create_nacionalidad($_POST);
            header('location:'. BASE_URL . '?controller=nacionalidad&action=index');
        }else{
            $this -> view('create_nacionalidad');
        }
    }
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
    public function delete_nacionalidad(){
        $pais_id = $_GET['pais_id'];
        $this -> nacionalidadModel -> delete_nacionalidad($pais_id);
        header('Location:'. BASE_URL. "?controller=nacionalidad&action=index");
    }

}
?>