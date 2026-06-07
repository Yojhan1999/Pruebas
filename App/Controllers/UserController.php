<?php


class UserController extends Controller{
    private $userModel;
    public function __construct(){
        $this -> userModel =  new User();
    }

    public function index(){
        $users = $this -> userModel -> getAll();
        $this -> view('index', ['users' => $users]);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->userModel->create($_POST);
            header('Location: ' . BASE_URL . '?controller=user&action=index');
        } else {
            $this->view('create');
        }
    }

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

    public function delete(){
        $id = $_GET['id'];
        $this -> userModel -> delete($id);
        header('Location: ' . BASE_URL . '?controller=user&action=index');
    }
    
}