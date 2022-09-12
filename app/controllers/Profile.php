<?php

class Profile extends Controllers
{
    public function __construct()
    {
        session_start();

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

    public function updateProfile()
    {
        if ($_POST) {

            $arrData = $this->model->sessionUpdate($_POST["id"], $_POST["role_id"]);
            $_SESSION["userData"] = $arrData;

            $arrResponse = array("status" => true, "msg" => "ok");
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
