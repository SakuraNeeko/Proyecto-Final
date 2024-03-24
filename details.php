<?php
require_once 'config/config.php';

$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if($token == $token_tmp){   /* los token se utilizan para detectar actos indebidos o problema de seguridad */

        $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1"); 
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0){

            $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 
            LIMIT 1"); /* asegura que me traiga un solo valor */
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento)/ 100);
            $dir_images = 'images/productos/' . $id . '/';

            $rutaImg = $dir_images . 'principal.jpg';

            if(!file_exists($rutaImg)){
                $rutaImg = 'images/no_photo.jpg';
            }

            $imagenes = array();
            if(file_exists($dir_images)){
                $dir = dir($dir_images);
            $dir = dir($dir_images);

            while (($archivo = $dir->read()) !=false){
                if($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
                    $imagenes[] = $dir_images . $archivo;
              
                }
            }
            $dir->close();
        }

        $sqlCaracter = $con->prepare("SELECT DISTINCT(det.id_caracteristica) AS idCat, cat.caracteristica FROM det_prod_caracter AS  det INNER JOIN caracteristicas AS cat ON det.id_caracteristica=cat.id WHERE det.id_producto=?");
        $sqlCaracter->execute([$id]);
        
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
    }else{
        echo 'Error al procesar la petición';
        exit;
    }
}

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1"); /* con esto generamos consultas preparadas */
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);  /* con esto estamos consultando la tabla entera */



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
        <div class = "row">
            <div class = "col-md-6 order-md-1">
                <div id="carouselImages" class="carousel slide">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src = "<?php echo $rutaImg; ?>"  class="d-block w-100 img-fluid" class="img-fluid"> <!-- Agregamos la clase img-fluid para que la imagen sea receptiva -->
                        </div>

                        <?php foreach($imagenes as $img) {?>
                            <div class = "carousel-item">
                                <img src = "<?php echo $img; ?>" class = "d-block w-100 img-fluid">
                            </div>
                        <?php } ?>
    
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
            <div class = "col-md-6 order-md-2">
                <h2><?php echo $nombre; ?></h2>
                <?php if($descuento > 0) { ?>
                    
                    <p><del><?php echo MONEDA . number_format($precio, 2, '.', '.'); ?></del></p>
                    <hr>
                    <h2><?php echo MONEDA . number_format($precio_desc, 2, '.', '.'); ?> 
                <small class ="text-success"> | <?php echo $descuento; ?>% descuento</small>
                </h2>
                
                <?php } else { ?>


                <h2><?php echo MONEDA . number_format($precio, 2, '.', '.'); ?></h2>

                <?php } ?>     
                <hr>

                <p class ="lead">
                    <?php echo $descripcion; ?>
                </p>

                <div class="col-3 my-3">
                    <?php 
                    
                    while ($row_cat = $sqlCaracter->fetch(PDO::FETCH_ASSOC)) {
                        $idCat = $row_cat['idCat'];
                        echo $row_cat['caracteristica']. ": ";

                        echo  "<select class='form-select' id='cat_$idCat'>"; 
                        
                        //obtengo

                        $sqlDet = $con->prepare("SELECT id, valor, stock FROM det_prod_caracter WHERE id_producto=? AND id_caracteristica=?");
                        $sqlDet->execute([$id, $idCat]);
                        while($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)){
                            echo "<option id='" . $row_det['id'] . "'>" . $row_det['valor'] . "</option>";

                        }

                        echo "</select>";
                    } 
                    ?>
                </div>

                <hr>

                <div class="col-3 my-3">
                    Cantidad: <input class="form-control" id="cantidad" name ="cantidad" type="number" min="1" max="10" value="1"></input>

                </div>

                <div class ="d-grid gap-3 col-10 mx-auto">
                    <button class ="btn btn-primary" type="button"><i class="fas fa-credit-card"></i> Comprar ahora</button>
                    <button class ="btn btn-outline-primary" id = "btnAgregar" type="button"><i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                </div>

            </div>

        </div>

    </div>
        
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    let btnAgregar = document.getElementById("btnAgregar");
    btnAgregar.onclick = function() {
        let inputCantidad = document.getElementById("cantidad").value; // Capturar el valor del input de cantidad aquí
        addProducto(<?php echo $id; ?>, inputCantidad, '<?php echo $token_tmp; ?>');
    };
     
    function addProducto(id, cantidad, token) {
        /* enviamos mediante ajax para actualizar en tiempo real los datos del carrito de compras */
        let url = 'clases/carrito.php';
        let formData = new FormData();
        formData.append('id', id);
        formData.append('cantidad', cantidad);
        formData.append('token', token);

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response=> response.json())
        .then(data => {
            if(data.ok){
                let elemento = document.getElementById("num_cart");
                elemento.innerHTML = data.numero;
            }
        });
    }
</script>

<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>

</body>
</html>