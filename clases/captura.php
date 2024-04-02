<?php 

require_once '../config/config.php';
<<<<<<< HEAD
=======
require_once '../config/database.php';
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

//echo '<pre>'; //etiqueta de html para que el texto o dato salga preformateado
//print_r($datos); //impresion de la manera en la que se obtienen los datos
//echo '</pre>';

if(is_array($datos)){

    $id_cliente = $_SESSION['user_cliente'];
    $sqlProd=$con->prepare("SELECT email FROM clientes WHERE id=? AND estatus=1");
    $sqlProd->execute([$id_cliente]);
    $row_cliente = $sqlProd->fetch(PDO::FETCH_ASSOC);
    
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];  //update_time es el mas reciente despues de create_time en los datos obtenidos
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    //$email = $datos['detalles']['payer']['email_address'];
    $email = $row_cliente['email'];
    //$id_cliente = $datos['detalles']['payer']['payer_id'];

    $sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);
    $id = $con->lastInsertId();


    if( $id > 0){
        
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if($productos != null ){

            foreach ($productos as $clave => $cantidad){
          
              $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND activo=1"); /* con esto generamos consultas preparadas */
              $sql->execute([$clave]);
              $row_prod = $sql->fetch(PDO::FETCH_ASSOC);  /* con esto estamos consultando producto por producto */

              $precio = $row_prod['precio'];
              $descuento = $row_prod['descuento'];
              $precio_desc = $precio - (($precio * $descuento) / 100);

              $sql_insert = $con->prepare("INSERT INTO detalle_compra(id_compra, id_producto, nombre, precio, cantidad) VALUES (?,?,?,?,?)");
              if($sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad])){
                restarStock($clave, $cantidad, $con);
              }
          
            }
<<<<<<< HEAD
            require 'Mailer.php';
=======
<<<<<<< HEAD
            require 'Mailer.php';
=======
<<<<<<< HEAD
            require_once 'Mailer.php';
=======
            require 'Mailer.php';
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

            $asunto = "Detalles de su pedido";
            $cuerpo = '<h4>Gracias por su compra</h4>';
            $cuerpo .= '<p>El ID de su compra es <b>'. $id_transaccion .'</b></p>';
            
            $mailer = new Mailer();
            $mailer->enviarEmail($email, $asunto, $cuerpo);
        }
        unset($_SESSION['carrito']);
    }
}

function restarStock($id, $cantidad, $con){

    $sql = $con->prepare("UPDATE productos SET stock = stock - ? WHERE id = ?");
    $sql->execute([$cantidad, $id]);

}
