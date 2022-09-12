<?php

// Definimos las variables
define("LIBS", "library/core/");

// Autoload
// Para poder cargar la clase de forma automatica
// Comprobamos si existe la clase, ejemplo: library/Core/home.php
spl_autoload_register(function ($class) {
    if (file_exists(LIBS . $class . ".php")) {

        // Si existe la clase, la importamos
        require_once(LIBS . $class . ".php");
    }
});
