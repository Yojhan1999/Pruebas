<?php 
/**
 * nacionalidad - Modelo para la tabla 'pais'
 * Contiene todas las operaciones CRUD para nacionalidades
 * Hereda la conexión $db de Model
 */
class nacionalidad extends Model{
    /**
     * Obtiene todas las nacionalidades
     * @return array Lista de países
     */
    public function getAll(){
        $stmt = $this -> db -> query("SELECT * FROM pais");
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una nacionalidad por su ID
     * @param int $pais_id ID del país
     * @return array Datos del país
     */
    public function getById($pais_id){
        $stmt = $this -> db -> prepare("SELECT * FROM pais WHERE pais_id = ?");
        $stmt -> execute([$pais_id]);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crea una nueva nacionalidad
     * @param array $data Datos del formulario (descripcion, idioma)
     * @return bool true si se insertó correctamente
     */
    public function create_nacionalidad($data){
        $stmt = $this -> db -> prepare("INSERT INTO pais (descripcion, idioma) values (?,?)");
        return $stmt  -> execute([$data['descripcion'], $data['idioma']]);
    }

    /**
     * Actualiza una nacionalidad existente
     * @param int   $pais_id ID del país a actualizar
     * @param array $data    Nuevos datos (descripcion, idioma)
     * @return bool true si se actualizó correctamente
     */
    public function update_nacionalidad($pais_id, $data){
        $stmt = $this -> db -> prepare("UPDATE pais SET descripcion = ?, idioma = ? WHERE pais_id = ?");
        return $stmt  -> execute([$data['descripcion'], $data['idioma'], $pais_id]);
    }

    /**
     * Elimina una nacionalidad
     * @param int $pais_id ID del país a eliminar
     * @return bool true si se eliminó correctamente
     */
    public function delete_nacionalidad($pais_id){
        $stmt = $this -> db -> prepare("DELETE FROM pais WHERE pais_id = ?");
        return $stmt  -> execute([$pais_id]); 
    }
}