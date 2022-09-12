<?php

class CourseModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $intIdcourse;
    private $strName;
    private $strDescription;
    private $strStart;
    private $strEnd;
    private $intActive;

    // Metodo para crear nuevos alumnos en la BD
    public function insertCourse(string $name, string $description, string $dateStart, string $dateEnd, int $active)
    {
        $this->strName = $name;
        $this->strDescription = $description;
        $this->strStart = $dateStart;
        $this->strEnd = $dateEnd;
        $this->intActive = $active;

        $queryInsert = "INSERT INTO `courses` (name, description, date_start, date_end, active) VALUES (?, ?, ?, ?, ?)";
        $arrData = array($this->strName, $this->strDescription, $this->strStart, $this->strEnd, $this->intActive);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectCourse($id)
    {
        $sql = "SELECT * FROM `courses` WHERE id_course = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllCourses()
    {
        $sql = "SELECT * FROM `courses`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteCourse($id)
    {
        $sql = "DELETE FROM `courses` WHERE id_course = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateCourse(int $id_course, string $name, string $description, string $dateStart, string $dateEnd, int $active)
    {
        $this->intIdcourse = $id_course;
        $this->strName = $name;
        $this->strDescription = $description;
        $this->strStart = $dateStart;
        $this->strEnd = $dateEnd;
        $this->intActive = $active;


        $sql = "UPDATE `courses` SET name=?, description=?, date_start=?, date_end=?, active=? WHERE id_course=?";
        $arrData = array($this->strName, $this->strDescription, $this->strStart, $this->strEnd, $this->intActive, $this->intIdcourse);

        return $this->update($sql, $arrData);
    }
}
