<?php 

class nacionalidad extends Model{
    public function getAll(){
        $stmt = $this -> db -> query("SELECT * FROM pais");
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($pais_id){
        $stmt = $this -> db -> prepare("SELECT * FROM pais WHERE pais_id = ?");
        $stmt -> execute([$pais_id]);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    public function create_nacionalidad($data){
        $stmt = $this -> db -> prepare("INSERT INTO pais (descripcion, idioma) values (?,?)");
        return $stmt  -> execute([$data['descripcion'], $data['idioma']]);
    }
    public function update_nacionalidad($pais_id, $data){
        $stmt = $this -> db -> prepare("UPDATE pais SET descripcion = ?, idioma = ? WHERE pais_id = ?");
        return $stmt  -> execute([$data['descripcion'], $data['idioma'], $pais_id]);
    }
    public function delete_nacionalidad($pais_id){
        $stmt = $this -> db -> prepare("DELETE FROM pais WHERE pais_id = ?");
        return $stmt  -> execute([$pais_id]); 
    }
}