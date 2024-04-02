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

//print_r($config);


?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3">Nueva Categoría</h2>

        <form action="guarda.php" method="post" autocomplete="off">
            <div class="mb-3">
<<<<<<< HEAD
                <label for="nombre" class="form-label">Nombre</label>
=======
<<<<<<< HEAD
                <label for="nombre" class="form-label">Nombre</label>
=======
                <label for="" class="form-label">Nombre</label>
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
                <input type="text" class="form-control" name="nombre" id="nombre" required autofocus />
            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Guardar
            </button>
            

        </form>

    </div>
</main>


<?php require_once '../footer.php'; ?>