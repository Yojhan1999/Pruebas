<?php
class User extends Model{
    public function getAll(){
        $stmt = $this -> db -> query("SELECT * FROM users");
        return $stmt  -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $stmt = $this -> db -> prepare("SELECT * FROM users WHERE id = ?");
        $stmt -> execute([$id]);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $stmt = $this -> db -> prepare("INSERT INTO users (nombre, correo) VALUES (?,?)");
    return $stmt -> execute([$data['nombre'], $data['correo']]);
    }

    public function update($id, $data){
        $stmt = $this -> db -> prepare("UPDATE users SET nombre = ?, correo = ? WHERE Id = ?");
        return $stmt -> execute([$data['nombre'], $data['correo'], $id]);
    }

    public function delete($id){
        $stmt = $this -> db -> prepare("DELETE FROM users WHERE id = ?");
        return $stmt -> execute([$id]);
    }
}