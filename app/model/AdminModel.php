<?php

class AdminModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $strName;
    private $strUsername;
    private $strEmail;
    private $strPassword;
    private $intRoleId;

    // Metodo para crear nuevos alumnos en la BD
    public function insertAdmin(string $name, string $username, string $email, string $password)
    {
        $this->strName = $name;
        $this->strUsername = $username;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $this->intRoleId = 3;

        $queryInsert = "INSERT INTO `users_admin` (name, username, email, pass, role_id) VALUES (?, ?, ?, ?, ?)";
        $arrData = array($this->strName, $this->strUsername, $this->strEmail, $this->strPassword, $this->intRoleId);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectAdmin($id)
    {
        $sql = "SELECT * FROM `users_admin` WHERE id_user_admin = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllAdmins()
    {
        $sql = "SELECT * FROM `users_admin`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteAdmin($id)
    {
        $sql = "DELETE FROM `users_admin` WHERE id_user_admin = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateAdmin(int $id, string $name, string $username, string $email, string $password)
    {
        $this->intId = $id;
        $this->strName = $name;
        $this->strUsername = $username;
        $this->strEmail = $email;
        $this->strPassword = $password;

        if (empty($this->strPassword)) {
            $sql = "UPDATE `users_admin` SET name=?, username=?, email=? WHERE id_user_admin=?";
            $arrData = array($this->strName, $this->strUsername, $this->strEmail, $this->intId);
        } else {
            $sql = "UPDATE `users_admin` SET name=?, username=?, email=?, pass=? WHERE id_user_admin=?";
            $arrData = array($this->strName, $this->strUsername, $this->strEmail, $this->strPassword, $this->intId);
        }

        return $this->update($sql, $arrData);
    }
}
