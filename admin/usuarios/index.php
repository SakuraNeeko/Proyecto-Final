<?php

require_once '../config/database.php';
require_once '../config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location: ../../index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$sql = "SELECT usuarios.id, CONCAT(clientes.nombres, ' ' , clientes.apellidos) AS cliente, usuarios.usuario, usuarios.activacion, 
CASE
WHEN usuarios.activacion=1 THEN 'activo'
WHEN usuarios.activacion=0 THEN 'No activado'
ELSE 'Deshabilitado'
END AS estatus
FROM usuarios
INNER JOIN clientes ON usuarios.id_cliente=clientes.id";
$resultado = $con->query($sql);

require '../header.php';

?>
<!-- contenido -->
<main class="flex-shrink-0">
    <div class="container">
        <hr>
        <h4>Usuarios</h4>

        <hr>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Estatus</th>
                        <th>Detalles</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>

                        <tr>
                            <td><?php echo $row['cliente']; ?></td>
                            <td><?php echo $row['usuario']; ?></td>
                            <td><?php echo $row['estatus']; ?></td>
                            <td>

                                <a href="cambiar_password.php?user_id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Cambiar Contraseña</a>

                                <?php if ($row['activacion'] == 1) : ?>

                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-user="<?php echo $row['id']; ?>">
                                        Baja
                                    </button>
                                <?php else : ?>

                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#activaModal" data-bs-user="<?php echo $row['id']; ?>">
                                        Activar
                                    </button>

                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal Deshabilita -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleModalLabel">Cuidado!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                ¿Está seguro de deshabilitar este usuario?

            </div>
            <div class="modal-footer">
                <form action="deshabilita.php" method="post">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Deshabilitar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Activar-->
<div class="modal fade" id="activaModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleModalLabel">Cuidado!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                ¿Está seguro de activar este usuario?

            </div>
            <div class="modal-footer">
                <form action="activa.php" method="post">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Activar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const user = button.getAttribute('data-bs-user')
        const inputId = eliminaModal.querySelector('.modal-footer input')

        inputId.value = user
    })

    const activaModal = document.getElementById('activaModal')
    activaModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const user = button.getAttribute('data-bs-user')
        const inputId = activaModal.querySelector('.modal-footer input')

        inputId.value = user
    })
</script>



<?php require_once '../footer.php'; ?>