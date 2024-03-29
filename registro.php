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

// Establish database connection
$db = new Database();
$con = $db->conectar();

// Initialize array to store errors
$errors = [];

// Check if form was submitted
if (!empty($_POST)) {
    // Retrieve form data
    $nombres = isset($_POST['nombres']) ? trim($_POST['nombres']) : '';
    $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
    $dni = isset($_POST['dni']) ? trim($_POST['dni']) : '';
    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $repassword = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';

    // Validate form data
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

    // If no errors, proceed with registration
    if (empty($errors)) {
        $id = registraCliente([$nombres, $apellidos, $email, $telefono, $dni], $con);

        if ($id > 0) {

<<<<<<< HEAD
            require_once 'clases/Mailer.php';
=======
<<<<<<< HEAD
            require_once 'clases/Mailer.php';
=======
            require 'clases/Mailer.php';
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
            $mailer = new Mailer();
            $token = generarToken();
            
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            $idUsuario = registraUsuario([$usuario, $pass_hash, $token, $id], $con);
            
            if ($idUsuario > 0) {
                $url = SITE_URL . '/activa_cliente.php?id=' .$idUsuario . '&token=' .$token;
                //http://localhost/proyecto/activa_cliente.php?id=18&token=5bdb5e43ac6cdf73447136ded60623aa
                $asunto = "Activar cuenta - WebTech Solutions";
                $cuerpo = "Estimado $nombres: <br> Para continuar con el proceso de registro es indispensable confirme su cuenta mediante el siguiente link <a href='$url'>Activar Cuenta</a>";

                if($mailer->enviarEmail($email, $asunto, $cuerpo)){
                    echo "Para terminar su proceso de registro siga las instrucciones enviadas a la dirección de correo electrónico $email";

                    exit;
                }
            } else{
                $errors[] = "Error al registrar usuario";
            }
        } else {
            $errors[] = "Error al registrar cliente";
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
<main>
    <div class="container">
        <h2>Datos del cliente</h2>
 
        <?php mostrarmensajes($errors); ?>

        <form class="row g-3" action="registro.php" method="post" autocomplete="off"> <!-- form para que redirija aqui mismo y no estar creando otros archivos innecesarios -->
            <div class="col-md-6">
                <label for="nombres"><span class="text-danger">*</span> Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control"  required>
            </div>

            <div class="col-md-6">
                <label for="apellidos"><span class="text-danger">*</span> Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="email"><span class="text-danger">*</span> Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <span id="validaEmail" class="text-danger"></span>
            </div>

            <div class="col-md-6">
                <label for="telefono"><span class="text-danger">*</span> Telefono</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="dni"><span class="text-danger">*</span> DNI</label>
                <input type="text" name="dni" id="dni" class="form-control" required>
                
            </div>

            <div class="col-md-6">
                <label for="usuario"><span class="text-danger">*</span> Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required>
                <span id="validaUsuario" class="text-danger"></span>
            </div>

            <div class="col-md-6">
                <label for="password"><span class="text-danger">*</span> Crea una contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="repassword"><span class="text-danger">*</span> Confirme su contraseña</label>
                <input type="password" name="repassword" id="repassword" class="form-control" required>
            </div>

            <i><b>Nota: </b> Los campos con asterisco son obligatorios</i>

            <div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>


        </form>
    </div>
        
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    let txtUsuario = document.getElementById('usuario') //peticiones en tiempo real sin tener que llamar al formulario
    txtUsuario.addEventListener("blur", function(){
        existeUsuario(txtUsuario.value)
    }, false)

    let txtEmail = document.getElementById('email') //peticiones en tiempo real sin tener que llamar al formulario
    txtEmail.addEventListener("blur", function(){
        existeEmail(txtEmail.value)
    }, false)

    function existeUsuario(usuario)
    {
        let url = "clases/clienteAjax.php" //en caso de ruta completa se puede agregar sin problemas
        let formData = new FormData()
        formData.append("action", "existeUsuario")
        formData.append("usuario", usuario)

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => response.json())
        .then(data => {

            if(data.ok){
                document.getElementById('usuario').value = ''
                document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible'
            }else{
                document.getElementById('validaUsuario').innerHTML = ''
            }
        })
    }

    function existeEmail(email){
        let url = "clases/clienteAjax.php" //en caso de ruta completa se puede agregar sin problemas
        let formData = new FormData()
        formData.append("action", "existeUsuario")
        formData.append("email", email)

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => response.json())  //revisar detalladamente esta parte, la funcion bota un error complicado
        .then(data => {

            if(data.ok){
                document.getElementById('email').value = ''
                document.getElementById('validaEmail').innerHTML = 'Email no disponible'
            }else{
                document.getElementById('validaEmail').innerHTML = ''
            }
        })
    }
</script>
</body>
</html>