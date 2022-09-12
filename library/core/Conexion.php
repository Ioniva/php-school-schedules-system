<?php

// Database connection
class Conexion
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;

    private $pdo;

    public function __construct()
    {
        // Set DSN
        $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ";charset=utf8";

        // Create PDO instance
        try {
            $this->pdo = new PDO($dns, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("There is and issue: " . $e->getMessage());
        }
    }

    public function connect()
    {
        return $this->pdo;
    }
}
