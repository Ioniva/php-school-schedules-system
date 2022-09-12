<?php

class Login extends Controllers
{
    public function __construct()
    {
        session_start();

        // Comprobar si existe esta variable de entorno
        if (isset($_SESSION["login"])) {
            header("location: " . base_url() . "/calendar");
        }

        parent::__construct();
    }

    public function login()
    {
        // Valores de los parametros son:
        // $this = Nombre de esta clase
        // "student" es el nombre de la vista
        // $data = datos que mandas a la vista
        $this->views->getView($this, "login");
    }

    public function loginUser()
    {
        if ($_POST) {

            if (empty($_POST["email"]) || empty($_POST["password"])) {
                $arrResponse = array("status" => false, "msg" => "Error de datos");
            } else {
                $email = strtolower(strClean($_POST["email"]));
                $dbPassword = $this->model->getUserHash($email);
                $checkPassword = password_verify($_POST["password"], $dbPassword);

                if ($checkPassword == 1) {
                    $requestUser = $this->model->loginUser($email, $dbPassword);

                    if (empty($requestUser)) {
                        $arrResponse = array("status" => false, "msg" => "El usuario o la contraseña es incorrecta");
                    } else {
                        $_SESSION["login"] = true;

                        $arrData = $this->model->sessionLogin($requestUser["user_id"], $requestUser["role_id"]);
                        $_SESSION["userData"] = $arrData;

                        $arrResponse = array("status" => true, "msg" => "ok");
                    }
                } else {
                    $arrResponse = array("status" => false, "msg" => "El usuario o la contraseña es incorrecta");
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
