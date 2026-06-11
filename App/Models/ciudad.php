<?php
/**
 * Ciudad - Modelo para la tabla 'ciudad'
 * Contiene todas las operaciones CRUD para ciudades
 * Hereda la conexión $db de Model
 */
Class Ciudad extends Model{
    /**
     * Obtiene todas las ciudades
     * @return array Lista de ciudades
     */
    public function getAll(){
        return $this->db->query("SELECT * FROM ciudad")->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Obtiene una ciudad por su ID
     * @param int $ciudad_id ID de la ciudad
     * @return array Datos de la ciudad
     */
    public function getById($ciudad_id){
        $stmt = $this->db->prepare("SELECT * FROM ciudad WHERE ciudad_id = ?");
        $stmt -> execute([$ciudad_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene ciudades por departamento
     * Útil para selects encadenados Departamento → Ciudad
     * @param int $departamento_id ID del departamento
     * @return array Lista de ciudades del departamento
     */
    public function getByDepartamento($departamento_id){
        $stmt = $this->db->prepare("SELECT * FROM ciudad WHERE departamento_id = ?");
        $stmt -> execute([$departamento_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Crea una nueva ciudad
     * @param array $data Datos del formulario (departamento_id, descripcion, sitio_turistico)
     * @return bool true si se insertó correctamente
     */
    public function create($data){
        $stmt = $this -> db -> prepare("INSERT INTO ciudad(departamento_id, descripcion, sitio_turistico) VALUES (?,?,?)");
        return $stmt -> execute([$data['departamento_id'], $data['descripcion'], $data['sitio_turistico']]);
    }

    /**
     * Actualiza una ciudad existente
     * @param int   $ciudad_id ID de la ciudad a actualizar
     * @param array $data      Nuevos datos
     * @return bool true si se actualizó correctamente
     */
    public function update($ciudad_id, $data) {
    $stmt = $this->db->prepare("UPDATE ciudad SET departamento_id = ?, descripcion = ?, sitio_turistico = ? WHERE ciudad_id = ?");
    return $stmt->execute([$data['departamento_id'], $data['descripcion'], $data['sitio_turistico'], $ciudad_id]);
    }

    /**
     * Elimina una ciudad
     * @param int $ciudad_id ID de la ciudad a eliminar
     * @return bool true si se eliminó correctamente
     */
    public function delete($ciudad_id){
        $stmt = $this -> db ->prepare("DELETE FROM ciudad WHERE ciudad_id = ?");
        return $stmt ->execute([$ciudad_id]);
    }
}