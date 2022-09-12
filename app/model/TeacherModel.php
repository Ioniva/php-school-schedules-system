<?php

class TeacherModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $strName;
    private $strSurname;
    private $strEmail;
    private $intPhone;
    private $strNif;
    private $strPassword;
    private $intRoleId;

    // Metodo para crear nuevos alumnos en la BD
    public function insertTeacher(string $name, string $surname, string $email, int $telephone, string $nif, string $password)
    {
        $this->strName = $name;
        $this->strSurname = $surname;
        $this->strEmail = $email;
        $this->intPhone = $telephone;
        $this->strNif = $nif;
        $this->strPassword = $password;
        $this->intRoleId = 2;

        $queryInsert = "INSERT INTO `teachers` (name, surname, email, telephone, nif, pass, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $arrData = array($this->strName, $this->strSurname, $this->strEmail, $this->intPhone, $this->strNif, $this->strPassword, $this->intRoleId);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectTeacher($id)
    {
        $sql = "SELECT * FROM `teachers` WHERE id_teacher = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllTeachers()
    {
        $sql = "SELECT * FROM `teachers`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteTeacher($id)
    {
        $sql = "DELETE FROM `teachers` WHERE id_teacher = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateTeacher(int $id, string $name, string $surname, string $email, int $telephone, string $nif, string $password)
    {
        $this->intId = $id;
        $this->strName = $name;
        $this->strSurname = $surname;
        $this->strEmail = $email;
        $this->intPhone = $telephone;
        $this->strNif = $nif;
        $this->strPassword = $password;


        if (empty($this->strPassword)) {
            $sql = "UPDATE `teachers` SET name=?, surname=?, email=?, telephone=?, nif=? WHERE id_teacher=?";
            $arrData = array($this->strName, $this->strSurname, $this->strEmail, $this->intPhone, $this->strNif, $this->intId);
        } else {
            $sql = "UPDATE `teachers` SET name=?, surname=?, email=?, telephone=?, nif=?, pass=? WHERE id_teacher=?";
            $arrData = array($this->strName, $this->strSurname, $this->strEmail, $this->intPhone, $this->strNif, $this->strPassword, $this->intId);
        }

        return $this->update($sql, $arrData);
    }
}
