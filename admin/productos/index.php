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

$sql = "SELECT id, nombre, descripcion, precio, descuento, stock, id_categoria FROM productos WHERE activo=1";
$resultado = $con->query($sql);
$productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

//print_r($config);


?>

<main>
    <div class="container-fluid px-4">
<<<<<<< HEAD
        <h2 class="mt-4">Productos</h2>

        <div class="d-flex mb-3">
            <a href="nuevo.php" class="btn btn-primary">Nuevo</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
=======
        <h2 class="mt-3">Productos</h2>

        <a href="nuevo.php" class="btn btn-primary">Nuevo</a>

        <div class="table-responsive">
            <table class="table table-hover">
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
<<<<<<< HEAD
                        <th scope="col" class="text-center">Stock</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
=======
                        <th scope="col">Stock</th>
                        <th scope="col"></th>
                        <th scope="col"></th>

>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <tr>
<<<<<<< HEAD
                            <td><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES); ?></td>
                            <td>$ <?php echo number_format($producto['precio'], 2); ?></td>
                            <td class="text-center"><?php echo $producto['stock']; ?></td>
=======
                            <td> <?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES); ?></td>
                            <td> <?php echo $producto['precio']; ?></td>
                            <td> <?php echo $producto['stock']; ?></td>
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                            <td>
                                <a href="edita.php?id=<?php echo $producto['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" data-bs-id="<?php echo $producto['id']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
<<<<<<< HEAD
                            </td>
                        </tr>
                    <?php } ?>
=======

                            </td>
                        </tr>


                    <?php } ?>

>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                </tbody>
            </table>
        </div>
    </div>
</main>


<<<<<<< HEAD


=======
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalElimina" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Confirmar
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">¿Estás seguro de querer eliminar este registro?</div>
            <div class="modal-footer">
                <form action="elimina.php" method="post">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    let eliminaModal = document.getElementById('modalElimina')
    eliminaModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let modalInput = eliminaModal.querySelector('.modal-footer input')
        modalInput.value = id
    })
</script>



<?php require_once '../footer.php'; ?>