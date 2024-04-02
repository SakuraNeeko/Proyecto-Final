<?php

require_once 'config/config.php';


$db = new Database();
$con = $db->conectar();

$idCategoria = $_GET['cat'] ?? '';
$orden = $_GET['orden'] ?? '';
$buscar = $_GET['q'] ?? '';

$filtro = '';

$orders = [
    'asc' => 'nombre ASC',
    'desc' => 'nombre DESC',
    'precio_alto' => 'precio DESC',
    'precio_bajo' => 'precio ASC',
];

$order = $orders[$orden] ?? '';

if (!empty($order)) {
    $order = " ORDER BY $order";
}

$params = [];

$query = "SELECT id,nombre, precio, descuento FROM productos WHERE activo=1 $order";

if ($buscar != '') {
    $query .= " AND nombre LIKE ?";
    $params[] = "%$buscar%";
    //$filtro = "AND (nombre LIKE '%$buscar%' OR descripcion LIKE '%$buscar%')"; //%% indican que no importa en donde se ubique la palabra que se esta buscando
}

if($idCategoria != ''){
    $query .= " AND id_categoria = ?";
    $params[] = $idCategoria;    
}

$query = $con->prepare($query);
$query->execute($params);

/* if (!empty($idCategoria)) {
    $sql = $con->prepare("SELECT id,nombre, precio, descuento FROM productos WHERE activo=1 $filtro AND id_categoria = ? $order");
    $sql->execute([$idCategoria]);
} else {
    $sql = $con->prepare("SELECT id,nombre, precio, descuento FROM productos WHERE activo=1 $filtro $order");
    $sql->execute();
} */

/* $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE activo=1");  *//* con esto generamos consultas preparadas */
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);  /* con esto estamos consultando la tabla entera */

$sqlCategorias = $con->prepare("SELECT id, nombre FROM categorias WHERE activo =1");
$sqlCategorias->execute();
$categorias = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);

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
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Categorías
                        </div>

                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">
                                Todo
                            </a>
                            <?php foreach ($categorias as $categoria) { ?>
                                <a href="index.php?cat=<?php echo $categoria['id']; ?>" class="list-group-item list-group-item-action <?php if ($idCategoria == $categoria['id']) echo 'active'; ?>">
                                    <?php echo $categoria['nombre']; ?>
                                </a>

                            <?php } ?>
                        </div>
                    </div> <!-- Agrega una fila en la cual indicamos que cuando sea un tamaño pequeño tenga una sola columna, cuando sea mas grande tenga mas y cunado sea aun mas grande sea mucho mas grande -->
                </div>

                <div class="col-12 col-md-10">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-end g-4">
                        <div class="col mb-2">
                            <form action="index.php" id="ordenForm" method="get">

                                <input type="hidden" name="cat" id="cat" value="<?php echo $idCategoria; ?>">

                                <select name="orden" id="orden" class="form-select form-select-sm" onchange="submitForm()">
                                    <option value="">Ordenar por</option>
                                    <option value="precio_alto" <?php echo ($orden === 'precio_alto') ? 'selected' : ''; ?>>Precios más altos</option>
                                    <option value="precio_bajo" <?php echo ($orden === 'precio_bajo') ? 'selected' : ''; ?>>Precios más bajos</option>
                                    <option value="asc" <?php echo ($orden === 'asc') ? 'selected' : ''; ?>>Nombre A - Z</option>
                                    <option value="desc" <?php echo ($orden === 'desc') ? 'selected' : ''; ?>>Nombre Z - A</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        <?php foreach ($resultado as $row) { ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <?php

                                    $id = $row['id'];
                                    $imagen = "images/productos/$id/principal.jpg";

                                    if (!file_exists($imagen)) {
                                        $imagen = "images/no_photo.jpg";
                                    }
                                    ?>
                                    <img src="<?php echo $imagen; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5> <!-- h5 para el titulo del producto -->
                                        <p class="text-success"> <?php echo MONEDA ?> <?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                                        <?php if ($row['descuento'] > 0) { ?>
                                            <strong><em>
                                                    <p class="text-danger">Descuento: <?php echo $row['descuento']; ?>%</p>
                                                </em></strong>
                                        <?php } ?>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detalles</a>
                                            <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function addProducto(id, token) {
            /* enviamos mediante ajax para actualizar en tiempo real los datos del carrito de compras */
            let url = 'clases/carrito.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero
                    } else {
                        alert("No hay suficientes existencias en stock")
                    }
                })
        }

        function submitForm() {
            document.getElementById('ordenForm').submit();
        }
    </script>

    <script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>

</body>

</html>