<?php
/**
 * User - Modelo para la tabla 'users'
 * Contiene todas las operaciones CRUD para usuarios
 * Hereda la conexión $db de Model
 */
class User extends Model{
    /**
     * Obtiene todos los usuarios
     * @return array Lista de usuarios
     */
    public function getAll(){
        $stmt = $this -> db -> query("SELECT * FROM users");
        return $stmt  -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un usuario por su ID
     * @param int $id ID del usuario
     * @return array Datos del usuario
     */
    public function getById($id){
        $stmt = $this -> db -> prepare("SELECT * FROM users WHERE id = ?");
        $stmt -> execute([$id]);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crea un nuevo usuario
     * @param array $data Datos del formulario (nombre, correo)
     * @return bool true si se insertó correctamente
     */
    public function create($data){
        $stmt = $this -> db -> prepare("INSERT INTO users (nombre, correo) VALUES (?,?)");
    return $stmt -> execute([$data['nombre'], $data['correo']]);
    }

    /**
     * Actualiza un usuario existente
     * @param int   $id   ID del usuario a actualizar
     * @param array $data Nuevos datos (nombre, correo)
     * @return bool true si se actualizó correctamente
     */
    public function update($id, $data){
        $stmt = $this -> db -> prepare("UPDATE users SET nombre = ?, correo = ? WHERE Id = ?");
        return $stmt -> execute([$data['nombre'], $data['correo'], $id]);
    }

    /**
     * Elimina un usuario
     * @param int $id ID del usuario a eliminar
     * @return bool true si se eliminó correctamente
     */
    public function delete($id){
        $stmt = $this -> db -> prepare("DELETE FROM users WHERE id = ?");
        return $stmt -> execute([$id]);
    }
}