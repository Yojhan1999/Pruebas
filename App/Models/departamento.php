<?php
/**
 * Departamento - Modelo para la tabla 'departamento'
 * Contiene todas las operaciones CRUD para departamentos
 * Hereda la conexión $db de Model
 */
class Departamento extends Model{
    /**
     * Obtiene todos los departamentos
     * @return array Lista de departamentos
     */
    public function getAll(){
        return $this->db->query("SELECT * FROM departamento")->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un departamento por su ID
     * @param int $departamento_id ID del departamento
     * @return array Datos del departamento
     */
    public function getByID($departamento_id){
        $stmt = $this->db->prepare("SELECT * FROM departamento WHERE departamento_id = ?");
        $stmt->execute([$departamento_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene departamentos por país
     * Útil para selects encadenados País → Departamento
     * @param int $pais_id ID del país
     * @return array Lista de departamentos del país
     */
    public function getByPais($pais_id){
        $stmt = $this->db->prepare("SELECT * FROM departamento WHERE pais_id = ?");
        $stmt->execute([$pais_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Crea un nuevo departamento
     * @param array $data Datos del formulario (pais_id, descripcion, comida_tipica)
     * @return bool true si se insertó correctamente
     */
    public function create($data){
        $stmt = $this->db->prepare("INSERT INTO departamento (pais_id, descripcion, comida_tipica) VALUES (?,?,?)");
        return $stmt->execute([$data['pais_id'], $data['descripcion'], $data['comida_tipica']]);
    }

    /**
     * Actualiza un departamento existente
     * @param int   $departamento_id ID del departamento a actualizar
     * @param array $data            Nuevos datos
     * @return bool true si se actualizó correctamente
     */
    public function update($departamento_id, $data){
        $stmt = $this->db->prepare("UPDATE departamento SET pais_id = ?, descripcion = ?, comida_tipica = ? WHERE departamento_id = ?");
        return $stmt->execute([$data['pais_id'], $data['descripcion'], $data['comida_tipica'], $departamento_id]);
    }

    /**
     * Elimina un departamento y sus ciudades asociadas
     * Primero elimina ciudades para respetar la llave foránea
     * @param int $departamento_id ID del departamento a eliminar
     * @return bool true si se eliminó correctamente
     */
    public function delete($departamento_id){
        // Elimina primero las ciudades asociadas (llave foránea)
        $stmt = $this->db->prepare("DELETE FROM ciudad WHERE departamento_id = ?");
        $stmt->execute([$departamento_id]);

        // luego elimina el departamento
        $stmt = $this->db->prepare("DELETE FROM departamento WHERE departamento_id = ?");
        return $stmt->execute([$departamento_id]);
    }
}