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

$sql = "SELECT id, nombre FROM categorias WHERE activo=1";
$resultado = $con->query($sql);
$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

//print_r($config);


?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3">Categorías</h2>

<<<<<<< HEAD
        <a href="nuevo.php" class="btn btn-primary my-3">Nuevo</a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
=======
        <a href="nuevo.php" class="btn btn-primary">Nuevo</a>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria) { ?>
<<<<<<< HEAD
                        <tr>
                            <td><?php echo $categoria['id']; ?></td>
                            <td><?php echo $categoria['nombre']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-warning btn-sm" href="edita.php?id=<?php echo $categoria['id']; ?>"><i class="fas fa-edit"></i> Editar</a>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" data-bs-id="<?php echo $categoria['id']; ?>">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </div>
=======

                        <tr>
                            <td><?php echo $categoria['id']; ?></td>
                            <td><?php echo $categoria['nombre']; ?></td>
<<<<<<< HEAD
                            <td><a class="btn btn-warning btn-sm" href="edita.php?id=<?php echo $categoria['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" data-bs-id="<?php echo $categoria['id']; ?>">
                                    <i class="fa-solid fa-trash"></i>
=======
                            <td><a class="btn btn-warning btn-sm" href="edita.php?id=<?php echo $categoria['id']; ?>">Editar</a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" data-bs-id="<?php echo $categoria['id']; ?>">
                                    Eliminar
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
                                </button>

>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                            </td>
                        </tr>
                    <?php } ?>
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
<<<<<<< HEAD
    eliminaModal.addEventListener('show.bs.modal', function(event) {
=======
<<<<<<< HEAD
    eliminaModal.addEventListener('show.bs.modal', function(event) {
=======
    eliminaModal.addEventListener('show.bs.modal', function(event){
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let modalInput = eliminaModal.querySelector('.modal-footer input')
<<<<<<< HEAD
        modalInput.value = id
=======
<<<<<<< HEAD
        modalInput.value = id
=======
        modalInput.value =id
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
    })
</script>



<?php require_once '../footer.php'; ?>