<?php

<<<<<<< HEAD
require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';
=======
<<<<<<< HEAD
require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';
=======
require 'config/config.php';
require 'config/database.php';
require 'clases/clienteFunciones.php';
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
if ($id == '' || $token == '') {
    header("Location: index.php");
    exit;
}

$db = new Database();
$con = $db->conectar();

echo validaToken($id, $token, $con);



?>