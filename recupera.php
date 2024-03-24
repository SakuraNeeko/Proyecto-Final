<?php

require_once 'config/config.php';

require_once 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];

if (!empty($_POST)) {

    $email = isset($_POST['email']) ? trim($_POST['email']) : '';


    if (esNulo([$email])) {
        $errors[] = 'Debe llenar todos los campos';
    }

    if (!esEmail($email)) {
        $errors[] = "La dirección de correo no es válida";
    }

    if(count($errors)==0){
      if(emailExiste($email, $con)){
        $sql = $con->prepare("SELECT usuarios.id, clientes.nombres FROM usuarios INNER JOIN clientes ON usuarios.id_cliente=clientes.id WHERE clientes.email LIKE ? LIMIT 1");
        $sql->execute([$email]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $user_id = $row['id'];
        $nombres = $row['nombres'];

        $token = solicitaPassword($user_id, $con);

        if($token !== null){
          require_once 'clases/Mailer.php';
          $mailer = new Mailer();

          $url = SITE_URL . '/reset_password.php?id=' .$user_id . '&token=' .$token;

          $asunto = "Recuperar Contraseña - WebTech Solutions";
          $cuerpo = "Estimado $nombres: <br> Si ha solicitado el cambio de su contraseña porfavor ingrese al siguiente link <a href='$url'>$url</a>.";
          $cuerpo.= "<br> Si no realizó esta solicitud puede ignorar este correo.";

          if($mailer->enviarEmail($email, $asunto, $cuerpo)){
            echo "<p><b>Correo Enviado</b><p>";
            echo "<p>Hemos enviado un correo electrónico a la siguiente dirección: $email para restablecer su contraseña.<p>";
            echo "<p><b>Nota: </b>Recuerda revisar el spam en caso de que no encuentres el correo en la bandeja de entrada.<p>";

            exit; 
        }
        }
      }else{
        $errors[] = "No existe una cuenta asociada a esta dirección de correo electrónico";
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
        <h2 class="display-6 fw-bold">Recuperar Contraseña</h2>
    </div>
  <?php mostrarMensajes($errors); ?>

  <form action="recupera.php" method = "post" class="row g-3" autocomplete="off">
    <div class="form-floating">
      <input class="form-control" type="email" name="email" id="email" placeholder="Correo Electrónico" required>
      <label for="email">Correo Electrónico</label>
    </div>

    <div class="d-grid gap-3 col-12">
      <button type="submit" class="btn btn-primary"><i class="fas fa-hand-point-right"></i> Continuar</button>
    </div>

    <div class="col-12">
      ¿Aún no tienes cuenta? <a href="registro.php">Registrate aquí</a>
    </div>

  </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>
</body>
</html>