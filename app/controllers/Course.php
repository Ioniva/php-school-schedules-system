<?php

class Course extends Controllers
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION["login"])) {
            header("location: " . base_url() . "/login");
        }

        parent::__construct();
    }

    public function course()
    {
        // Recoger todos los datos para despues mandarlos a la vista
        $data = $this->model->selectAllCourses();

        // Valores de los parametros son:
        // $this = Nombre de esta clase
        // "student" es el nombre de la vista
        // $data = datos que mandas a la vista
        $this->views->getView($this, "course", $data);
    }

    public function setCourse()
    {
        // ¿Llegan datos por el metodo POST?
        if ($_POST) {

            // Comprobar si todas las  variables tienen contenido
            if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['date_start']) || empty($_POST['date_end']) || empty($_POST['active'])) {

                // En caso de no tener contenido, mostar mensaje de error
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {

                // Inicializar variables
                // strClean = limpiar las espacios en blanco del string
                // ucwords = convertir la inicial en mayus
                // strtolower = convertir el texto en minus
                $id = intval($_POST['id']);
                $name = ucwords(strClean($_POST["name"]));
                $description = ucwords(strClean($_POST["description"]));
                $date_end = $_POST["date_start"];
                $date_start = $_POST["date_end"];
                $active = 0;
                if ($_POST["active"] == "on") {
                    $active = 1;
                } else {
                    $active = 0;
                }
                // 0 = Crear/insertar
                // 1 = Actualizar
                // Comprobar el el valor del $id
                if ($id == 0) {
                    // Crear/insertar alumno
                    $option = 1;
                    // Guardar en variable el valor recibido del modelo
                    $request_user = $this->model->insertCourse($name, $description, $date_start, $date_end, $active);
                } else {
                    // Actualizar alumno
                    $option = 2;

                    // Guardar en variable el valor recibido del modelo
                    $request_user = $this->model->updateCourse($id, $name, $description, $date_start, $date_end, $active);
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

    public function getCourse(int $id)
    {
        // Inicializar variable
        $idCourse = intval($id);

        // Comprobar si el id recibido es mayor que 0
        if ($idCourse > 0) {

            // Guardar en variable el valor recibido del modelo
            $arrData = $this->model->selectCourse($idCourse);

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

    public function delCourse()
    {
        // Comprobar si el metodo recibe datos mediante el metodo POST
        if ($_POST) {

            // Inicializar variable
            $intId = intval($_POST['id']);

            // Guardar en variable el valor recibido del modelo
            $requestDelete = $this->model->deleteCourse($intId);

            // Comrpobar si el valor devuelto es true
            if ($requestDelete) {

                // Mostrar mensaje de error
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el curso');
            } else {

                // Mostrar mensaje de exito
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el curso.');
            }

            // Devolver resultado en formato JSON
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        // exito
        die();
    }
}
