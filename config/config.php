<?php
//Configuracion del sistema
define("SITE_URL", "http://localhost/proyecto");
define("KEY_TOKEN", "ABC.sda-220*");
define("MONEDA", "$");

<<<<<<< HEAD
$path = dirname(__FILE__);


require_once $path. '/database.php';
require_once $path. '/../admin/clases/cifrado.php';

$db=new Database();
$con=$db->conectar();

$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [] ;

foreach ($datos as $dato) {
    $config[$dato['nombre']] = $dato["valor"];

}


//Configuracion del sistema
define("SITE_URL", "http://localhost/proyecto");
define("KEY_TOKEN", "ABC.sda-220*");
define("MONEDA", "$");

=======
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
//Configuracion para Paypals
define("CLIENT_ID", "Ab3YPJhFY42Vimi2rx-aivYBLThv102I-NWC-1XREPwHFyaCc7rtcLWWGqUZY_5D7dmxBqcMrs4DLF7h");
define("CURRENCY", "USD");

//Configuracion Mercado Pago, se pdoria continuar,pero el servicio no esta disponible para ecuador
//define("KEY_TOKEN", "ABC.sda-220*");

 /* Lo agregamos aqui para que sea algo dinamico y no tener que estar utilizandolo cada que lo necesitemos */

//Datos para envio de correo electrónico
<<<<<<< HEAD
define("MAIL_HOST", $config['correo_smtp']);
define("MAIL_USER", $config['correo_email']);
define("MAIL_PASS", descifrar($config['correo_password']));
define("MAIL_PORT", $config['correo_puerto']);
=======
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_USER", "bryanmoranchandi@gmail.com");
define("MAIL_PASS", "arpd bryy koyz oxro");
define("MAIL_PORT", "587");
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f

session_start();


$num_cart=0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
