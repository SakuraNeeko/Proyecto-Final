<?php

<<<<<<< HEAD
require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';
=======
<<<<<<< HEAD
require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';
=======
require 'config/config.php';
require 'config/database.php';
require 'clases/clienteFunciones.php';
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff

$user_id = $_GET['id'] ?? $_POST['user_id'] ?? ''; //Primero busca el id, sino el user_id, sino toma vomo vacio las variables
$token = $_GET['token'] ?? $_POST['token'] ?? '';

if($user_id == '' || $token == ''){
  header("Location: index.php");
  exit;
}

$db = new Database();
$con = $db->conectar();

$errors = [];

if(!verificaTokenRequest($user_id, $token, $con)){
  echo "No se pudo verificar la información";
  exit;
}

if (!empty($_POST)) {

    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $repassword = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';

    if (esNulo([$user_id, $token, $password, $repassword])) {
        $errors[] = 'Debe llenar todos los campos';
    }

    if (!validaPassword($password, $repassword)) {
        $errors[] = "Las contraseñas no coinciden";
    }

    if(count($errors)==0){
      $pass_hash = password_hash($password, PASSWORD_DEFAULT);
      if(actualizaPassword($user_id, $pass_hash, $con)){
        echo "Contraseña modificada.<br><a href='login.php'>Iniciar sesión</a>";
        exit;
      }else{
        $errors[] = "Error al modificar contraseña. Intentalo nuevamente.";
      }
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
<main class="form-login m-auto pt-4">
    <div class="text-center mt-4">
        <h2 class="display-6 fw-bold">Cambiar Contraseña</h2>
    </div>
  <?php mostrarMensajes($errors); ?>

  <form action="reset_password.php" method = "post" class="row g-3" autocomplete="off">
  
  <input type="hidden" name="user_id" id="user_id" value="<?= $user_id; ?>"/>
  <input type="hidden" name="token" id="token" value="<?= $token; ?>"/>

    <div class="form-floating">
      <input class="form-control" type="password" name="password" id="password" placeholder="Nueva Contraseña" required>
      <label for="password">Nueva Contraseña</label>
    </div>

    <div class="form-floating">
      <input class="form-control" type="password" name="repassword" id="repassword" placeholder="Confirmar Contraseña" required>
      <label for="repassword">Confirmar Contraseña</label>
    </div>

    <div class="d-grid gap-3 col-12">
      <button type="submit" class="btn btn-primary"><i class="fas fa-hand-point-right"></i> Continuar</button>
    </div>

    <div class="col-12">
      <a href="login.php">Iniciar Sesión</a>
    </div>

  </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>