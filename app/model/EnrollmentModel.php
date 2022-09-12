<?php

class EnrollmentModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $intIdEnrollment;
    private $intIdStudent;
    private $intIdCourse;
    private $intStatus;


    // Metodo para crear nuevos alumnos en la BD
    public function insertEnrollment(int $id_student, int $id_course, bool $status)
    {
        $this->intIdStudent = $id_student;
        $this->intIdCourse = $id_course;
        $this->intStatus = $status;

        $queryInsert = "INSERT INTO `enrollment` (id_student, id_course, status) VALUES (?, ?, ?)";
        $arrData = array($this->intIdStudent, $this->intIdCourse, $this->intStatus);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectEnrollment($id)
    {
        $sql = "SELECT * FROM `enrollment` WHERE id_enrollment = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllEnrollments()
    {
        $sql = "SELECT * FROM `enrollment`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteEnrollment($id)
    {
        $sql = "DELETE FROM `enrollment` WHERE id_enrollment = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateEnrollment(int $id_enrollment, int $id_student, bool $id_course, int $status)
    {
        $this->intIdEnrollment = $id_enrollment;
        $this->intIdStudent = $id_student;
        $this->intIdCourse = $id_course;
        $this->intStatus = $status;

        $sql = "UPDATE `enrollment` SET id_student=?, id_course=?, status=? WHERE id_enrollment=?";
        $arrData = array($this->intIdStudent, $this->intIdCourse, $this->intStatus, $this->intIdEnrollment);

        return $this->update($sql, $arrData);
    }
}
