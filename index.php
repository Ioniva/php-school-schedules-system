<?php

require_once("configs/config.php");
require_once("src/helpers/helpers.php");

// Capturamos el valor de la URL
// URL esta compuesta por: http://localhost/controlador/metodo/parametros
// En caso de no existir el controlador, utilizaremos el controlador home
$url = !empty($_GET['url']) ? $_GET['url'] : 'login/login';

// Separamos la cadena URL por el separador "/"
$arrUrl = explode("/", $url);

// Definimos las variables con los datos recogidos en la URL
$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = "";

// Comprobar si la posicion 1 de la URL esta vacia
if (!empty($arrUrl[1])) {

    // Si NO esta vacia, asignamos valor a la variable
    $method = $arrUrl[1];
}

// Comprobar si la posicion 2 de la URL esta vacia
if (!empty($arrUrl[2])) {

    // Si NO esta vacia, recorrer cada parametro de la URL
    for ($i = 2; $i < count($arrUrl); $i++) {

        // Asignamos parametro a la variable
        $params .= $arrUrl[$i] . ',';
    }

    // Eliminamos la ultima ","
    $params = trim($params, ",");
}

require_once("library/core/Autoload.php");
require_once("library/core/Load.php");
