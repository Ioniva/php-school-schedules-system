<?php

class Admin extends Controllers
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION["login"])) {
            header("location: " . base_url() . "/login");
        }

        parent::__construct();
    }

    public function admin()
    {
        // Recoger todos los datos para despues mandarlos a la vista
        $data = $this->model->selectAllAdmins();

        // Valores de los parametros son:
        // $this = Nombre de esta clase
        // "student" es el nombre de la vista
        // $data = datos que mandas a la vista
        $this->views->getView($this, "admin", $data);
    }

    public function setAdmin()
    {
        // ¿Llegan datos por el metodo POST?
        if ($_POST) {

            // Comprobar si todas las  variables tienen contenido
            if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email'])) {

                // En caso de no tener contenido, mostar mensaje de error
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {

                // Inicializar variables
                // strClean = limpiar las espacios en blanco del string
                // ucwords = convertir la inicial en mayus
                // strtolower = convertir el texto en minus
                $id = intval($_POST['id']);
                $name = ucwords(strClean($_POST["name"]));
                $username = strClean($_POST["username"]);
                $email = strtolower($_POST["email"]);
                
                // 0 = Crear/insertar
                // 1 = Actualizar
                // Comprobar el el valor del $id
                if ($id == 0) {

                    // Crear/insertar alumno
                    $option = 1;
                    // Crear un hash apartir de la contraseña introducido por el usuario
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    // Guardar en variable el valor recibido del modelo
                    $request_user = $this->model->insertAdmin($name, $username, $email, $password);
                } else {
                    // Actualizar alumno
                    $option = 2;
                    // Si la password es vacia, mantener vacia, y en caso contrario generar hash
                    $password = empty($_POST["password"]) ? "" : password_hash($_POST["password"], PASSWORD_DEFAULT);
                    // Guardar en variable el valor recibido del modelo
                    $request_user = $this->model->updateAdmin($id, $name, $username, $email, $password);
                }
                // Valor devuelto de la base de datos (true?)
                if ($request_user > 0) {

                    // Mostrar mensaje de exito segun la funcion
                    if ($option == 1) {
                        $arrResponse = array("status" => true, "msg" => "Datos guardados correctamente.");
                    } else {
                        $arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente.");
                    }
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }

                // Devolver resultado en formato JSON
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            // exit
            die();
        }
    }

    public function getAdmin(int $id)
    {
        // Inicializar variable
        $idAdmin = intval($id);

        // Comprobar si el id recibido es mayor que 0
        if ($idAdmin > 0) {

            // Guardar en variable el valor recibido del modelo
            $arrData = $this->model->selectAdmin($idAdmin);

            // Comprobar si el valor devuelto esta vacio
            if (empty($arrData)) {

                // Mostrar un mensaje de error
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {

                // Mostrar un mensaje de exito
                $arrResponse = array('status' => true, 'data' => $arrData);
            }

            // Devolver resultado en formato JSON
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        // exit
        die();
    }

    public function delAdmin()
    {
        // Comprobar si el metodo recibe datos mediante el metodo POST
        if ($_POST) {

            // Inicializar variable
            $intId = intval($_POST['id']);

            // Guardar en variable el valor recibido del modelo
            $requestDelete = $this->model->deleteAdmin($intId);

            // Comrpobar si el valor devuelto es true
            if ($requestDelete) {

                // Mostrar mensaje de error
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el administrador');
            } else {

                // Mostrar mensaje de exito
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el administrador.');
            }

            // Devolver resultado en formato JSON
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        // exito
        die();
    }
}
