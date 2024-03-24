<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE activo=1"); /* con esto generamos consultas preparadas */
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);  /* con esto estamos consultando la tabla entera */

//session_destroy();

//print_r($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda WebTech Solutions</title>
    <!-- cdn servidores que almacenan bibliotecas  -->
    <!-- CDN busca el mas cercano al usuario que está solicitando la página dando el recurso, siendo mas veloz y consumiendo menos recursos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!--     <link href="css/all.min.css" rel = "stylesheet"> -->
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>

<?php include 'menu.php'; ?> 

<!-- contenido -->
<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">  <!-- Agrega una fila en la cual indicamos que cuando sea un tamaño pequeño tenga una sola columna, cuando sea mas grande tenga mas y cunado sea aun mas grande sea mucho mas grande -->
            <?php foreach($resultado as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php 

                        $id = $row['id'];
                        $imagen = "images/productos/$id/principal.jpg";

                        if(!file_exists($imagen)){
                            $imagen = "images/no_photo.jpg";

                        }
                        ?>
                        <img src="<?php echo $imagen; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5> <!-- h5 para el titulo del producto -->
                            <p class="text-info"> <?php echo MONEDA ?> <span class="fw-bold"><?php echo number_format($row['precio'], 2, '.',','); ?></span></p>
                            <?php if($row['descuento'] > 0){ ?>
                                <strong><em><p class="text-danger">Descuento: <?php echo $row['descuento']; ?>%</p></em></strong>
                            <?php } ?>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                    <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1' , $row['id'], KEY_TOKEN); ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detalles</a>
                                    <button class ="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1' , $row['id'], KEY_TOKEN); ?>')">Agregar al carrito <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
</main>

<?php include 'footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    function addProducto(id, token){  /* enviamos mediante ajax para actualizar en tiempo real los datos del carrito de compras */
        let url = 'clases/carrito.php'
        let formData = new FormData()
        formData.append('id' , id)
        formData.append('token' , token)  

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response=> response.json())
        .then(data => {
            if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero 
            }
        })
    }
</script>

<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>

</body>
</html>