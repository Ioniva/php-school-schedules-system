<?php

class StudentModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $strName;
    private $strSurname;
    private $strUsername;
    private $strEmail;
    private $intPhone;
    private $strNif;
    private $strPassword;
    private $intRoleId;

    // Metodo para crear nuevos alumnos en la BD
    public function insertStudent(string $name, string $surname, string $username, string $email, int $telephone, string $nif, string $password)
    {
        $this->strName = $name;
        $this->strSurname = $surname;
        $this->strUsername = $username;
        $this->strEmail = $email;
        $this->intPhone = $telephone;
        $this->strNif = $nif;
        $this->strPassword = $password;
        $this->intRoleId = 1;

        $queryInsert = "INSERT INTO `students` (name, surname, username, email, telephone, nif, pass, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $arrData = array($this->strName, $this->strSurname, $this->strUsername, $this->strEmail, $this->intPhone, $this->strNif, $this->strPassword, $this->intRoleId);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectStudent($id)
    {
        $sql = "SELECT * FROM `students` WHERE id = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllStudents()
    {
        $sql = "SELECT * FROM `students`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteStudent($id)
    {
        $sql = "DELETE FROM `students` WHERE id = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateStudent(int $id, string $name, string $surname, string $username, string $email, int $telephone, string $nif, string $password)
    {
        $this->intId = $id;
        $this->strName = $name;
        $this->strSurname = $surname;
        $this->strUsername = $username;
        $this->strEmail = $email;
        $this->intPhone = $telephone;
        $this->strNif = $nif;
        $this->strPassword = $password;

        if (empty($this->strPassword)) {
            $sql = "UPDATE `students` SET name=?, surname=?, username=?, email=?, telephone=?, nif=? WHERE id=?";
            $arrData = array($this->strName, $this->strSurname, $this->strUsername, $this->strEmail, $this->intPhone, $this->strNif, $this->intId);
        } else {
            $sql = "UPDATE `students` SET name=?, surname=?, username=?, email=?, telephone=?, nif=?, pass=? WHERE id=?";
            $arrData = array($this->strName, $this->strSurname, $this->strUsername, $this->strEmail, $this->intPhone, $this->strNif, $this->strPassword, $this->intId);
        }

        return $this->update($sql, $arrData);
    }
}
