<?php
class Mysql extends Conexion
{
    private $conexion;
    private $strquery;
    private $arrvalues;

    function __construct()
    {
        $this->conexion = new Conexion;
        $this->conexion = $this->conexion->connect();
    }

    // Insertar un nuevo registro
    public function insert(string $query, array $arrvalues)
    {
        $this->strquery = $query;
        $this->arrvalues = $arrvalues;

        $insert = $this->conexion->prepare($this->strquery);
        $resInsert = $insert->execute($this->arrvalues);

        if ($resInsert) {
            $lastInsert = $this->conexion->lastInsertId();
        } else {
            $lastInsert = 0;
        }

        return $lastInsert;
    }

    // Busca un registro
    public function select(string $query)
    {
        $this->strquery = $query;

        $result = $this->conexion->prepare($this->strquery);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // Devuelve todos los registros
    public function select_all(string $query)
    {
        $this->strquery = $query;

        $result = $this->conexion->prepare($this->strquery);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualiza registro
    public function update(string $query, array $arrvalues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrvalues;

        $update = $this->conexion->prepare($this->strquery);

        return $update->execute($this->arrValues);
    }

    // Eliminar un registro
    public function delete(string $query)
    {
        $this->strquery = $query;

        $result = $this->conexion->prepare($this->strquery);
        return $result->execute();
    }
}
