<?php

class Database {

    private $hostname = "localhost";
    private $database = "tienda_online";
    private $username = "root";
    private $password = "equestria22";
    private $charset = "utf8";

    function conectar()
    {

        try {
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, /* Configuracion para evitar que las preparaciones de las consultas no sean emuladas y tengan seguridad */
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);  /* El options no se le pone el this porque esta dentro de la funcion, el otro esta fuera y hay que llamarlo */

            return $pdo;
        } catch (PDOException $e){
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}
