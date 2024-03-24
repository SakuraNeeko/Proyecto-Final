<?php

require_once 'config/config.php';
require_once 'config/database.php';
require_once 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];

if (!empty($_POST)) {

    $nombres = isset($_POST['nombres']) ? trim($_POST['nombres']) : '';
    $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
    $dni = isset($_POST['dni']) ? trim($_POST['dni']) : '';
    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $repassword = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';

    if (esNulo([$nombres, $apellidos, $email, $telefono, $dni, $usuario, $password, $repassword])) {
        $errors[] = 'Debe llenar todos los campos';
    }

    if (!esEmail($email)) {
        $errors[] = "La dirección de correo no es válida";
    }

    if (!validaPassword($password, $repassword)) {
        $errors[] = "Las contraseñas no coinciden";
    }

    if (usuarioExiste($usuario, $con)) {
        $errors[] = "El nombre de usuario $usuario ya existe";
    }

    if (emailExiste($email, $con)) {
        $errors[] = "El correo electrónico $email ya existe";
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

<header data-bs-theme="dark">
  
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand">
        <strong>WebTech Solutions</strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class= "collapse navbar-collapse" id ="navbarHeader">
        <ul class ="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="#" class="nav-link active">Catálogo</a>

            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">Contacto</a>

            </li>
        </ul>
        
        <a href="checkout.php" class="btn btn-primary">
            Carrito <span id = "num_cart" class = "badge bg-secondary"><?php echo $num_cart; ?></span>
        </a>
        
      </div>


    </div>
  </div>
</header>
<!-- contenido -->
<main>
    <div class="container">

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>