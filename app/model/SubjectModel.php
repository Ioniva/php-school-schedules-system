<?php

class SubjectModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $intIdTeacher;
    private $intIdCourse;
    private $intIdSchedule;
    private $strName;
    private $strColor;

    // Metodo para crear nuevos alumnos en la BD
    public function insertSubject(int $id_teacher, int $id_course, int $id_schedule, string $name, string $color)
    {

        $this->intIdTeacher = $id_teacher;
        $this->intIdCourse = $id_course;
        $this->intIdSchedule = $id_schedule;
        $this->strName = $name;
        $this->strColor = $color;

        $queryInsert = "INSERT INTO `class` (id_teacher, id_course, id_schedule, name, color) VALUES (?, ?, ?, ?, ?)";
        $arrData = array($this->intIdTeacher, $this->intIdCourse, $this->intIdSchedule, $this->strName, $this->strColor);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectSubject($id)
    {
        $sql = "SELECT * FROM `class` WHERE id_class = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllSubjects()
    {
        $sql = "SELECT * FROM `class`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteSubject($id)
    {
        $sql = "DELETE FROM `class` WHERE id_class = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateSubject(int $id_class, int $id_teacher, int $id_course, int $id_schedule, string $name, string $color)
    {
        $this->id_class = $id_class;
        $this->intIdTeacher = $id_teacher;
        $this->intIdCourse = $id_course;
        $this->intIdSchedule = $id_schedule;
        $this->strName = $name;
        $this->strColor = $color;
        $sql = "UPDATE `class` SET id_teacher=?, id_course=?, id_schedule=?, name=?, color=? WHERE id_class=?";
        $arrData = array($this->intIdTeacher, $this->intIdCourse, $this->intIdSchedule, $this->strName, $this->strColor, $this->id_class);

        return $this->update($sql, $arrData);
    }
}
