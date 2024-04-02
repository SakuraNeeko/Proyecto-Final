<?php

//Pantalla login de cliente

require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$proceso = isset($_GET['pago']) ? 'pago' : 'login';

$errors = [];

if (!empty($_POST)) {

    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $proceso = $_POST['proceso'] ?? 'login';
   

    if (esNulo([$usuario, $password])) {
        $errors[] = 'Debe llenar todos los campos';
    }

    if(count($errors) == 0){
        $errors[] = login($usuario, $password, $con, $proceso);
    }

}

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
<main class="form-login m-auto pt-4>">
    <div class="text-center mt-4">
        <h2 class="display-6 fw-bold">Iniciar Sesión</h2>
    </div>

    <?php mostrarMensajes($errors); ?>

    <form class="row g-3" action="login.php" method="post" autocomplete="off"> 

    <input type="hidden" name = "proceso" value="<?php echo $proceso; ?>">
        <div class="form-floating">
            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario">
            <label for="usuario">Usuario</label>
        </div>

        <div class="form-floating">
            <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
            <label for="password">Contraseña</label>
        </div>

        <div class="col-12">
            <a href="recupera.php">¿Olvidaste tu contraseña?</a>
        </div>

        <div class="d-grid gap-3 col-12">
            <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
        </div>

        <hr>

        <div class="col-12">
            ¿Aún no tienes cuenta? <a href="registro.php">Registrate aquí</a>
        </div>

    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>

</body>
</html>