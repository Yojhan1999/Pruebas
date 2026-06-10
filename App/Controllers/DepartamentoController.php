<?php

class DepartamentoController extends Controller{
    private $departamentoModel;
    private $nacionalidadModel;

    public function __construct(){
        $this -> departamentoModel = new Departamento();
        $this -> nacionalidadModel = new nacionalidad(); 
    }
    public function index(){
        $departamentos = $this ->departamentoModel ->getAll();
        $this->view('departamento/index',['departamentos' => $departamentos]);
    }
    public function create(){
        $paises = $this->nacionalidadModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->departamentoModel->create($_POST);
            header('Location: ' . BASE_URL . '?controller=departamento&action=index');
        }else{
            $this -> view('departamento/create', ['paises' => $paises]);
        }
    }
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
    public function delete(){
        $departamento_id = $_GET['departamento_id'];
        $this->departamentoModel->delete($departamento_id);
        header('Location:'.BASE_URL.'?controller=departamento&action=index');
    }
}