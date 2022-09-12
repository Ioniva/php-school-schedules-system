<?php

class Logout
{
    public function __construct()
    {
        // Inicializamos la sesion
        session_start();
        // Limpiamos todas las variables de sesion
        session_unset();
        // Destruimos la sesion
        session_destroy();
        // Redirigimos al usuario a otra pantalla
        header("location: " . base_url() . "/login");
    }
}
