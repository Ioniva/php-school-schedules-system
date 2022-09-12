<?php

// Retorna la URL del proyecto
function base_url()
{
    return BASE_URL;
}

// Muestra información formateada
function debug($var)
{
    $debug = debug_backtrace();
    echo "<pre>";
    echo $debug[0]['file'] . " " . $debug[0]['line'] . "<br><br>";
    print_r($var);
    echo "</pre>";
    echo "<br>";
}

function getModal(string $nameModal, $data)
{
    $viewModal = "app/views/includes/modals/{$nameModal}.php";
    require_once($viewModal);
}

function debugToConsole($var)
{
    $output = $var;
    if (is_array($output)) {
        $output = implode(',', $output);
        echo "<script>console.log('Debug Object: " . $output . "')</script>";
    }
}

// function sessionUser(int $idpersona)
// {
//     require_once("model/LoginModel.php");
//     $objLogin = new LoginModel();
//     $request = $objLogin->sessionLogin($idpersona);
//     return $request;
// }

//Elimina excesos de espacios entre palabras
function strClean($strCadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>", "", $string);
    $string = str_ireplace("</script>", "", $string);
    $string = str_ireplace("<script src>", "", $string);
    $string = str_ireplace("<script type=>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1'='1", "", $string);
    $string = str_ireplace('OR "1"="1"', "", $string);
    $string = str_ireplace('OR ´1´=´1´', "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("in NULL; --", "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace('LIKE ´', "", $string);
    $string = str_ireplace("OR 'a'='a", "", $string);
    $string = str_ireplace('OR "a"="a', "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    return $string;
}

// Genera una contraseña de 10 caracteres
function passGenerator($Length = 10)
{
    $pass = "";
    $longitudPass = $Length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz1234567890";
    $longitudCadena = strlen($cadena);

    for ($i = 1; $i <= $longitudPass; $i++) {
        $pos = rand(0, $longitudCadena - 1);
        $pass .= substr($cadena, $pos, 1);
    }
    return $pass;
}

// Genera un token
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    return ($r1 . "-" . $r2 . "-" . $r3 . "-" . $r4);
}

// Formato para valores monetarios
function formatMoney($cantidad)
{
    return number_format($cantidad, 2, SPD, SPM);
}
