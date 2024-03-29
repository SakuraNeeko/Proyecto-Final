<?php

require '../config/database.php';
require '../config/config.php';
require '../header.php';


if (!isset($_SESSION['user_type'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SESSION['user_type'] != 'admin') {
    header('Location: ../../index.php');
    exit;
}



$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];

$sql = $con->prepare("SELECT id, nombre, descripcion, precio, stock, descuento, id_categoria FROM productos WHERE id=? AND activo=1");
$sql->execute([$id]);
$producto = $sql->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT id, nombre FROM categorias WHERE activo=1";
$resultado = $con->query($sql);
$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

$rutaImagenes = '../../images/productos/' . $id . '/';
$imagenPrincipal = $rutaImagenes . 'principal.jpg';

$imagenes = [];
$dirInit = dir($rutaImagenes);

while (($archivo = $dirInit->read())  !== false) {
    if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') ||  strpos($archivo, 'jpeg') || strpos($archivo, 'JPEG'))) {
        $image = $rutaImagenes . $archivo;
        $imagenes[] = $image;
    }
}
$dirInit->close();


//print_r($config);


?>

<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 250px;
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>


<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3">Modificar Producto</h2>

        <form action="actualiza.php" method="post" enctype="multipart/form-data" autocomplete="off"> <!-- //enctype="multipart/form-data" sin esto no reconoce el archivo y no se pueden guardar las imagenes -->
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES); ?>" required autofocus />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea type="text" class="form-control" name="descripcion" id="editor"><?php echo $producto['descripcion']; ?></textarea>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <label for="imagen_principal" class="form-label">Imagen Principal</label>
                    <input type="file" class="form-control" name="imagen_principal" id="imagen_principal" accept="image/jpeg/JPEG" />
                </div>
                <div class="col">
                    <label for="otras_imagenes" class="form-label">Otras imágenes</label>
                    <input type="file" class="form-control" name="otras_imagenes[]" id="otras_imagenes" accept="image/jpeg/JPEG" multiple />
                </div>
            </div>

            <div class="row mb-2">
                <!-- Columna de la imagen principal -->
                <div class="col-12 col-md-6">
                    <?php if (file_exists($imagenPrincipal)) { ?>
                        <img src="<?php echo $imagenPrincipal. '?id=' . time(); ?>?'id=" class="img-thumbnail my-3"><br>
                        <button class="btn btn-danger btn-sm" onclick="eliminaImagen('<?php echo $imagenPrincipal; ?>')">Eliminar</button>

                    <?php } ?>
                </div>
                <!-- Columna de las demás imagenes -->
                <div class="col-12 col-md-6">
                    <div class="row">
                        <?php foreach ($imagenes as $imagen) { ?>
                            <div class="col-4">
                                <img src="<?php echo $imagen. '?id=' . time(); ?>" class="img-thumbnail my-3"><br>
                                <button class="btn btn-danger btn-sm" onclick="eliminaImagen('<?php echo $imagen; ?>')">Eliminar</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" required />
                </div>

                <div class="col mb-3">
                    <label for="descuento" class="form-label">Descuento</label>
                    <input type="number" class="form-control" name="descuento" id="descuento" value="<?php echo $producto['descuento']; ?>" required />
                </div>

                <div class="col mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $producto['stock']; ?>" required />
                </div>


            </div>

            <div class="row">

                <div class="col-4 mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select class="form-select" name="categoria" id="categoria" required>
                        <option value="">Seleccionar</option>
                        <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $producto['id_categoria']) echo 'selected'; ?>><?php echo $categoria['nombre']; ?></option>

                            x
                        <?php } ?>
                    </select>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>


        </form>

    </div>
</main>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    function eliminaImagen(urlImagen) {
        let url = 'eliminar_imagen.php';
        let formData = new FormData()
        formData.append('urlImagen', urlImagen)

        fetch(url, {
            method: 'POST',
            body: formData
        }).then((response) => {
            if (response.ok) {
                location.reload()
            }
        })
    }
</script>



<?php require_once '../footer.php'; ?>