<?php

class Subject extends Controllers
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION["login"])) {
            header("location: " . base_url() . "/login");
        }

        parent::__construct();
    }

    public function subject()
    {
        // Recoger todos los datos para despues mandarlos a la vista
        $data = $this->model->selectAllSubjects();

        // Valores de los parametros son:
        // $this = Nombre de esta clase
        // "student" es el nombre de la vista
        // $data = datos que mandas a la vista
        $this->views->getView($this, "subject", $data);
    }

    public function setSubject()
    {

        // ¿Llegan datos por el metodo POST?
        if ($_POST) {

            // Comprobar si todas las  variables tienen contenido
            if (empty($_POST['id_teacher']) || empty($_POST['id_course']) || empty($_POST['id_schedule']) || empty($_POST['name']) || empty($_POST['color'])) {
                // En caso de no tener contenido, mostar mensaje de error
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {
                // Inicializar variables
                // strClean = limpiar las espacios en blanco del string
                // ucwords = convertir la inicial en mayus
                // strtolower = convertir el texto en minus
                $id = intval($_POST['id']);
                $id_teacher = intval($_POST['id_teacher']);
                $id_course = intval($_POST['id_course']);
                $id_schedule = intval($_POST['id_schedule']);
                $name = ucwords(strClean($_POST["name"]));
                $color = strClean($_POST["color"]);

                // 0 = Crear/insertar
                // 1 = Actualizar
                // Comprobar el el valor del $id
                if ($id == 0) {
                    debug($_POST);
                    // Crear/insertar alumno
                    $option = 1;
                    // Guardar en variable el valor recibido del modelo
                    $request_user = $this->model->insertSubject($id_teacher, $id_course, $id_schedule, $name, $color);
                } else {
                    // Actualizar alumno
                    $option = 2;
                    // Guardar en variable el valor recibido del modelo
                    $request_user = $this->model->updateSubject($id, $id_teacher, $id_course, $id_schedule, $name, $color);
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

    public function getSubject(int $id)
    {
        // Inicializar variable
        $idSubject = intval($id);

        // Comprobar si el id recibido es mayor que 0
        if ($idSubject > 0) {

            // Guardar en variable el valor recibido del modelo
            $arrData = $this->model->selectSubject($idSubject);

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

    public function delSubject()
    {
        // Comprobar si el metodo recibe datos mediante el metodo POST
        if ($_POST) {

            // Inicializar variable
            $intId = intval($_POST['id']);

            // Guardar en variable el valor recibido del modelo
            $requestDelete = $this->model->deleteSubject($intId);

            // Comrpobar si el valor devuelto es true
            if ($requestDelete) {

                // Mostrar mensaje de error
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el profesor');
            } else {

                // Mostrar mensaje de exito
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el profesor.');
            }

            // Devolver resultado en formato JSON
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        // exito
        die();
    }
}
