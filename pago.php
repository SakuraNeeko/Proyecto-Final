<?php

require 'config/config.php';
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if($productos != null ){

  foreach ($productos as $clave => $cantidad){

    $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1"); /* con esto generamos consultas preparadas */
    $sql->execute([$clave]);
    $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);  /* con esto estamos consultando producto por producto */
  }
} else{
    header("Location: index.php");
    exit;
}


//session_destroy();

//print_r($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <!-- cdn servidores que almacenan bibliotecas  -->
    <!-- CDN busca el mas cercano al usuario que está solicitando la página dando el recurso, siendo mas veloz y consumiendo menos recursos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>

    <?php include 'menu.php'; ?> 

<!-- contenido -->
<main>
    <div class="container"> 

        <div class ="row">
            <div class ="col-6">
                <h4>Detalles de Pago</h4>
                <div id="paypal-button-container"></div>
            </div>    
        <div class = "col-6">      
            <div class = "table-responsive">
                <table class = "table">
                <thead>
                    <tr>
                    <th>Producto</th>
                    <th>Subtotal</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                    echo ' <tr><td colspan = "5" class ="text-center"><b>Lista vacía</b></td></tr>';

                    }else{

                    $total = 0;
                    foreach($lista_carrito as $producto){
                        $_id = $producto['id'];
                        $nombre = $producto['nombre'];
                        $precio = $producto['precio'];
                        $descuento = $producto['descuento'];
                        $cantidad = $producto['cantidad'];
                        $precio_desc = $precio - (($precio * $descuento) / 100);
                        $subtotal = $cantidad * $precio_desc;
                        $total += $subtotal;
                    ?>  
                
                
                    <tr>
                    <td><?php echo $nombre; ?></td>
                    <td>
                        <div id = "subtotal_<?php echo $_id; ?>" name = "subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                    </td>

                    </tr>
                    <?php } ?>

                    <tr>
                    <td colspan="2">
                        <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ',');?></p>
                    </td>
                    </tr>
                </tbody>

                <?php } ?>

                </table>
            </div>
            </div>
        </div>
    </div>
        
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://www.paypal.com/sdk/js?client-id=Ab3YPJhFY42Vimi2rx-aivYBLThv102I-NWC-1XREPwHFyaCc7rtcLWWGqUZY_5D7dmxBqcMrs4DLF7h&currency=USD"></script>

<script>
    paypal.Buttons({
        style:{
            color:'blue',
            shape:'pill',
            label:'pay'
        },
        createOrder: function(data, actions){
            // Obtener el valor total desde el elemento con id 'total'
            // Est es una manera de solucionar el cuestionable problema de cierre de ventanana automatico
            var total = document.getElementById('total').innerText.replace('<?php echo MONEDA ?>', '').replace(',', '');

            return actions.order.create({
                purchase_units:[{
                amount:{
                value: total
                }
                }]
            });
        },

        onApprove: function(data, actions){
            let URL = 'clases/captura.php'
            actions.order.capture().then(function(detalles) {
                //window.location.href="completado.html"
                console.log(detalles)

                let url= 'clases/captura.php'


                return fetch(url, {
                    method: 'post',
                    headers: {
                        'content-type' : 'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles
                    })
                }).then(function(response){
                    window.location.href = "completado.php?key=" + detalles['id']; //$datos['detalles']['id']
                })

            });
        },

        onCancel: function(data){
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render("#paypal-button-container");
</script>

<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>

</body>

</html>