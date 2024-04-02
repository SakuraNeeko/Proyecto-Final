<?php

class Database {

    private $hostname = "localhost";
    private $database = "tienda_online";
    private $username = "root";
<<<<<<< HEAD
    private $password = "";
=======
<<<<<<< HEAD
    private $password = "";
=======
    private $password = "equestria22";
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
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
