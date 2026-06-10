<?php
class Departamento extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM departamento")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByID($departamento_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM departamento WHERE departamento_id = ?");
        $stmt->execute([$departamento_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getByPais($pais_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM departamento WHERE pais_id = ?");
        $stmt->execute([$pais_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO departamento (pais_id, descripcion, comida_tipica) VALUES (?,?,?)");
        return $stmt->execute([$data['pais_id'], $data['descripcion'], $data['comida_tipica']]);
    }
    public function update($departamento_id, $data)
    {
        $stmt = $this->db->prepare("UPDATE departamento SET pais_id = ?, descripcion = ?, comida_tipica = ? WHERE departamento_id = ?");
        return $stmt->execute([$data['pais_id'], $data['descripcion'], $data['comida_tipica'], $departamento_id]);
    }
    public function delete($departamento_id)
    {
        // primero elimina las ciudades asociadas
        $stmt = $this->db->prepare("DELETE FROM ciudad WHERE departamento_id = ?");
        $stmt->execute([$departamento_id]);

        // luego elimina el departamento
        $stmt = $this->db->prepare("DELETE FROM departamento WHERE departamento_id = ?");
        return $stmt->execute([$departamento_id]);
    }
}