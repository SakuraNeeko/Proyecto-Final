<?php
//Configuracion del sistema
define("SITE_URL", "http://localhost/proyecto");
define("KEY_TOKEN", "ABC.sda-220*");
define("MONEDA", "$");

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
$path = dirname(__FILE__);


require_once $path. '/database.php';
require_once $path. '/../admin/clases/cifrado.php';

$db=new Database();
$con=$db->conectar();

$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
<<<<<<< HEAD
$datosConfig = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [] ;

foreach ($datosConfig as $datoConfig) {
    $config[$datoConfig['nombre']] = $datoConfig["valor"];
=======
$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [] ;

foreach ($datos as $dato) {
    $config[$dato['nombre']] = $dato["valor"];
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

}


//Configuracion del sistema
define("SITE_URL", "http://localhost/proyecto");
define("KEY_TOKEN", "ABC.sda-220*");
define("MONEDA", "$");

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
//Configuracion para Paypals
define("CLIENT_ID", "Ab3YPJhFY42Vimi2rx-aivYBLThv102I-NWC-1XREPwHFyaCc7rtcLWWGqUZY_5D7dmxBqcMrs4DLF7h");
define("CURRENCY", "USD");

//Configuracion Mercado Pago, se pdoria continuar,pero el servicio no esta disponible para ecuador
//define("KEY_TOKEN", "ABC.sda-220*");

 /* Lo agregamos aqui para que sea algo dinamico y no tener que estar utilizandolo cada que lo necesitemos */

//Datos para envio de correo electrónico
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
define("MAIL_HOST", $config['correo_smtp']);
define("MAIL_USER", $config['correo_email']);
define("MAIL_PASS", descifrar($config['correo_password']));
define("MAIL_PORT", $config['correo_puerto']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_USER", "bryanmoranchandi@gmail.com");
define("MAIL_PASS", "arpd bryy koyz oxro");
define("MAIL_PORT", "587");
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

session_start();


$num_cart=0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
