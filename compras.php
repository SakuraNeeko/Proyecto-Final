<?php

<<<<<<< HEAD
require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';
=======
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
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

$db = new Database();
$con = $db->conectar();

$token= generarToken();
$_SESSION['token']= $token;

$idCliente = $_SESSION['user_cliente'];

$sql = $con->prepare("SELECT id_transaccion, fecha, status, total FROM compra WHERE id_cliente=? ORDER BY DATE(fecha) DESC");
$sql->execute([$idCliente]);


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
        <h4>Mis compras</h4>
        
        <hr>

        <?php while($row=$sql->fetch(PDO::FETCH_ASSOC)){?>

        <div class="card mb-3 border-info">
            <div class="card-header">
                <?php echo $row['fecha']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Folio: <?php echo  $row['id_transaccion']; ?></h5>
                <p class="card-text">Total: <?php echo MONEDA. $row['total']; ?> </p>
                <a href="compra_detalle.php?orden=<?php echo $row['id_transaccion']; ?>&token=<?php echo $token; ?>" class="btn btn-primary">Detalles</a>
            </div>
        </div>

        <?php } ?>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>