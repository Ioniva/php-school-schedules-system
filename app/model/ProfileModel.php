<?php

class ProfileModel extends Mysql
{
    public function __construct()
    {

        // Comprobar si existe esta variable de entorno
        if (empty($_SESSION["login"])) {
            header("location: " . base_url() . "/login");
        }

        parent::__construct();
    }

    public function profile()
    {
        $this->views->getView($this, "profile");
    }

    public function sessionUpdate(int $userId, int $roleId)
    {
        $this->intRoleId = $roleId;
        $this->intUserId = $userId;

        // Alumnos
        if ($this->intRoleId == 1) {
            $sql = "SELECT s.id as user_id,
                            s.username,
                            s.email,
                            s.name,
                            s.surname,
                            s.telephone,
                            s.nif,
                            r.id AS role_id,
                            r.name AS role_name,
                            s.date_registered
                            FROM `students` s
                            INNER JOIN `roles` r
                            ON s.role_id = r.id
                            WHERE s.id = '$this->intUserId'";
        }

        // Profesores
        if ($this->intRoleId == 2) {
            $sql = "SELECT t.id_teacher AS user_id,
                            t.email,
                            t.name,
                            t.surname,
                            t.telephone,
                            t.nif,
                            r.id AS role_id,
                            r.name AS role_name
                            FROM `teachers` t
                            INNER JOIN `roles` r
                            ON t.role_id = r.id
                            WHERE t.id_teacher = '$this->intUserId'";
        }

        // Administrador
        if ($this->intRoleId == 3) {
            $sql = "SELECT  a.id_user_admin AS user_id,
                            a.email,
                            a.name,
                            r.id AS role_id,
                            r.name AS role_name
                    FROM `users_admin` a
                    INNER JOIN `roles` r
                    ON a.role_id = r.id
                    WHERE a.id_user_admin = '$this->intUserId'";
        }

        return $this->select($sql);
    }
}
