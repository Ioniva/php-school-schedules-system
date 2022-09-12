<?php

class ScheduleModel extends Mysql
{
    // Definiendo propiedades del estudiante = campos de la base de datos
    private $intIdSchedule;
    private $strTimeStart;
    private $strTimeEnd;
    private $strDay;


    // Metodo para crear nuevos alumnos en la BD
    public function insertSchedule(string $time_start, string $time_end, string $day)
    {
        $this->strTimeStart = $time_start;
        $this->strTimeEnd = $time_end;
        $this->strDay = $day;

        $queryInsert = "INSERT INTO `schedule` (time_start, time_end, day) VALUES (?, ?, ?)";
        $arrData = array($this->strTimeStart, $this->strTimeEnd, $this->strDay);

        return $this->insert($queryInsert, $arrData);
    }

    // Metodo para seleccionar alumno por Id de la BD
    public function selectSchedule($id)
    {
        $sql = "SELECT * FROM `schedule` WHERE id_schedule = $id";

        return $this->select($sql);
    }

    // Metodo para seleccionar todos los alumnos de la BD
    public function selectAllSchedules()
    {
        $sql = "SELECT * FROM `schedule`";

        return $this->select_all($sql);
    }

    // Metodo para eliminar alumno por id de la BD
    public function deleteSchedule($id)
    {
        $sql = "DELETE FROM `schedule` WHERE id_schedule = $id";

        return $this->delete($sql);
    }

    // Metodo para actualizar alumno
    public function updateSchedule(int $id_schedule, string $time_start, string $time_end, string $day)
    {
        $this->intIdSchedule = $id_schedule;
        $this->strTimeStart = $time_start;
        $this->strTimeEnd = $time_end;
        $this->strDay = $day;

        $sql = "UPDATE `schedule` SET time_start=?, time_end=?, day=? WHERE id_schedule=?";
        $arrData = array($this->strTimeStart, $this->strTimeEnd, $this->strDay, $this->intIdSchedule);


        return $this->update($sql, $arrData);
    }
}
