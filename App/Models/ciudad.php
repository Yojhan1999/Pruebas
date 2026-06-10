<?php

Class Ciudad extends Model{
    public function getAll(){
        return $this->db->query("SELECT * FROM ciudad")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($ciudad_id){
        $stmt = $this->db->prepare("SELECT * FROM ciudad WHERE ciudad_id = ?");
        $stmt -> execute([$ciudad_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getByDepartamento($departamento_id){
        $stmt = $this->db->prepare("SELECT * FROM ciudad WHERE departamento_id = ?");
        $stmt -> execute([$departamento_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $stmt = $this -> db -> prepare("INSERT INTO ciudad(departamento_id, descripcion, sitio_turistico) VALUES (?,?,?)");
        return $stmt -> execute([$data['departamento_id'], $data['descripcion'], $data['sitio_turistico']]);
    }
    public function update($ciudad_id, $data) {
    $stmt = $this->db->prepare("UPDATE ciudad SET departamento_id = ?, descripcion = ?, sitio_turistico = ? WHERE ciudad_id = ?");
    return $stmt->execute([$data['departamento_id'], $data['descripcion'], $data['sitio_turistico'], $ciudad_id]);
}
    public function delete($ciudad_id){
        $stmt = $this -> db ->prepare("DELETE FROM ciudad WHERE ciudad_id = ?");
        return $stmt ->execute([$ciudad_id]);
    }
}